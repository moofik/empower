<?php

namespace App\Providers;


use App\Service\Api\ProblemResponseFactory;
use App\Service\Error\GuzzleErrorFormatter;
use App\Service\Image\FilesystemImageUploader;
use App\Service\Image\ImageUploader;
use App\Service\Security\PassportJwtTokenFactory;
use App\Validator\Image64ArrayExtender;
use App\Validator\Image64Extender;
use GuzzleHttp\Client;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Validation\Factory;
use Illuminate\Support\ServiceProvider;
use Intervention\Image\ImageManager;
use Laracasts\Generators\GeneratorsServiceProvider;
use Psr\Log\LoggerInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register(GeneratorsServiceProvider::class);
        }

        $this->app->bind(ImageUploader::class, function (Application $app) {
            $manager = new ImageManager(array('driver' => 'gd'));

            return new FilesystemImageUploader($manager);
        });

        /**
         * @see ProblemResponseFactory
         */
        $this->app->bind(ProblemResponseFactory::class, function (Application $app) {
            return new ProblemResponseFactory('http://example.com');
        });

        /**
         * @see PassportJwtTokenFactory
         */
        $this->app->bind(PassportJwtTokenFactory::class, function (Application $app) {
            $tokenFactoryHttpClient = new Client(['base_uri' => env('DOCKER_URL')]);

            return new PassportJwtTokenFactory(
                $tokenFactoryHttpClient,
                new GuzzleErrorFormatter(),
                config('passport.login_url'),
                config('passport.client_id'),
                config('passport.client_secret')
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @param  Factory  $validator
     * @param  LoggerInterface  $logger
     * @return void
     */
    public function boot(Factory $validator, LoggerInterface $logger)
    {
        $this->extendValidationRules($validator, $logger);
    }

    /**
     * @param  Factory  $validator
     * @param  LoggerInterface  $logger
     */
    private function extendValidationRules(Factory $validator, LoggerInterface $logger)
    {
        (new Image64Extender())->extend($validator);
        (new Image64ArrayExtender($logger))->extend($validator);
    }
}
