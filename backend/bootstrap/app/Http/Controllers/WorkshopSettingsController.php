<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBasicSettings;
use App\Http\Requests\UpdateEmail;
use App\Http\Requests\UpdatePassword;
use App\Http\Resources\ShopEmailResource;
use App\Http\Resources\ShopSettingsResource;
use App\Mail\NewPasswordConfirmation;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\UrlGenerator;

class ShopSettingsController extends Controller
{
    /**
     * @param Guard $guard
     * @return ShopSettingsResource
     */
    public function basicSettings(Guard $guard)
    {
        /** @var User|User $user */
        $user = $guard->user();

        return new ShopSettingsResource($user->workshopSettings);
    }

    /**
     * @param UpdateBasicSettings $request
     * @param Guard $guard
     * @return ShopSettingsResource
     */
    public function updateBasicSettings(UpdateBasicSettings $request, Guard $guard)
    {
        /** @var User $user */
        $user = $guard->user();

        $settings = $user->workshopSettings;
        $settings->update($request->toArray());

        return new ShopSettingsResource($settings);
    }

    /**
     * @param Guard $guard
     * @return ShopEmailResource
     */
    public function email(Guard $guard): ShopEmailResource
    {
        /** @var User $user */
        $user = $guard->user();

        return new ShopEmailResource($user);
    }

    /**
     * @param UpdateEmail $request
     * @param Guard $guard
     * @param UrlGenerator $urlGenerator
     * @param Mailer $mailer
     * @return JsonResponse
     */
    public function updateEmail(UpdateEmail $request, Guard $guard, UrlGenerator $urlGenerator, Mailer $mailer): JsonResponse
    {
        /** @var User|User $user */
        $user = $guard->user();
        $user->new_email = $request->email;
        $user->is_new_email_confirmed = false;
        $user->save();

        $mail = new NewPasswordConfirmation($user, $urlGenerator);
        $mail->onQueue('default');
        $mailer->to($request->email)->queue($mail);

        return new JsonResponse();
    }

    /**
     * @param UpdatePassword $request
     * @param Guard $guard
     * @param Hasher $hasher
     * @return JsonResponse
     */
    public function updatePassword(UpdatePassword $request, Guard $guard, Hasher $hasher): JsonResponse
    {
        /** @var User|User $user */
        $user = $guard->user();
        $user->password = $hasher->make($request->password);
        $user->save();

        return new JsonResponse();
    }
}
