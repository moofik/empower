<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Routing\UrlGenerator;

class NewPasswordConfirmation extends Mailable
{
    public const CONFIRMATION_ROUTE_NAME = 'email.confirm';

    use Queueable, SerializesModels;

    /**
     * @var User
     */
    private $user;

    /**
     * @var string
     */
    private $signedUrl;

    /**
     * Create a new message instance.
     *
     * @param  User  $user
     * @param  UrlGenerator  $urlGenerator
     */
    public function __construct(User $user, UrlGenerator $urlGenerator)
    {
        $this->user = $user;
        $this->signedUrl = $urlGenerator->signedRoute(self::CONFIRMATION_ROUTE_NAME, ['user' => $this->user]);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('New email confirmation')
            ->from(env('MAIL_FROM'))
            ->markdown('emails.confirm-email')
            ->with([
                'username' => $this->user->full_name,
                'url' => $this->signedUrl,
            ]);
    }
}
