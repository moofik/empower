<?php

namespace App\Http\Controllers;

use App\Filter\ValueFilterFactory;
use App\Http\Resources\Pipeline\PublicWorkshopPipeline;
use App\Http\Resources\Transformer\Shop\AddCanWriteFeedback;
use App\Http\Resources\Transformer\Shop\AddLastFeedback;
use App\Repository\RatingRepository;
use App\Repository\ItemRequestRepository;
use App\Repository\ShopFeedbackRepository;
use App\Repository\ShopRepository;
use App\Service\Monitoring\TelescopeMonitor;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Moofik\LaravelFilters\Filter\Runner\FilterRunnerFactory;
use Moofik\LaravelResourceExtenstion\Extension\ExtendableResourceCollection;
use Moofik\LaravelResourceExtenstion\Extension\RestrictableResource;

class ShopController extends Controller
{
    /**
     * @param int $workshopId
     * @param Guard $guard
     * @param ShopRepository $workshopRepository
     * @param ItemRequestRepository $repairRequestRepository
     * @param ShopFeedbackRepository $feedbackRepository
     * @param RatingRepository $ratingRepository
     * @return RestrictableResource
     */
    public function workshop(
        int $workshopId,
        Guard $guard,
        ShopRepository $workshopRepository,
        ItemRequestRepository $repairRequestRepository,
        ShopFeedbackRepository $feedbackRepository,
        RatingRepository $ratingRepository
    )
    {
        TelescopeMonitor::tagDatabaseQueries('get-workshop');

        /** @var User $user */
        $user = $guard->user();

        /** @var User $workshop */
        $workshop = User::with(User::RELATIONS)
            ->where('id', $workshopId)
            ->firstOrFail();

        $workshop = new RestrictableResource($workshop);
        $defaultWorkshopPipeline = new PublicWorkshopPipeline($workshopRepository);
        $canWriteFeedback = new AddCanWriteFeedback($user, $repairRequestRepository, $feedbackRepository);
        $addLastFeedback = new AddLastFeedback($feedbackRepository, $ratingRepository);

        return $workshop
            ->applyPipeline($defaultWorkshopPipeline)
            ->applyTransformer($canWriteFeedback)
            ->applyTransformer($addLastFeedback);
    }

    /**
     * @param Request $request
     * @param ShopRepository $workshopRepository
     * @return ExtendableResourceCollection
     * @throws \Moofik\LaravelFilters\Exceptions\ModelClassNotFilterable
     * @throws \Moofik\LaravelFilters\Exceptions\ModelClassNotFound
     * @throws \Moofik\LaravelFilters\Exceptions\ShouldBeImplemented
     */
    public function workshops(Request $request, ShopRepository $workshopRepository, FilterRunnerFactory $factory)
    {
        TelescopeMonitor::tagDatabaseQueries('get-workshops');

        $factory->createFor('User');
        $filter = ValueFilterFactory::createFromRequest($request);

        $builderCallback = function (Builder $query) {
            $query->where('name', '=', User::USER_ROLE_SHOP);
        };

        $eagerLoadRelations = [
            User::RELATION_SHOP_SETTINGS,
            User::RELATION_SHOP_BRAND,
            User::RELATION_SHOP_SERVICES,
            User::RELATION_SHOP_SPARE_PARTS,
        ];

        $workshopQueryBuilder = User::with($eagerLoadRelations)
            ->whereHas('roles', $builderCallback);

        $builder = $filter->apply($workshopQueryBuilder);

        if ($filter->getPerPage()) {
            $workshops = $builder->paginate($filter->getPerPage());
        } else {
            $workshops = $builder->paginate();
        }

        $pipeline = new PublicWorkshopPipeline($workshopRepository);

        return ExtendableResourceCollection::extendableCollection($workshops)->applyPipeline($pipeline);
    }
}
