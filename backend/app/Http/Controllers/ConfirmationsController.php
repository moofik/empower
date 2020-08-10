<?php

namespace App\Http\Controllers;


use App\Service\Api\Problem;
use App\Service\Api\ProblemException;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Illuminate\View\View;

class ConfirmationsController extends Controller
{
    /**
     * @param  UrlGenerator  $urlGenerator
     * @param  Request  $request
     * @param  int  $user
     * @return Factory|View
     */
    public function confirmEmailChange(UrlGenerator $urlGenerator, Request $request, int $user)
    {
        if (!$urlGenerator->hasValidSignature($request)) {
            $problem = new Problem(401);
            throw new ProblemException($problem);
        }

        /** @var User $user */
        $user = User::find($user);

        if (!$user) {
            $problem = new Problem(401);
            throw new ProblemException($problem);
        }

        $user->email = $user->new_email;
        $user->is_new_email_confirmed = true;
        $user->save();

        return view('app');
    }
}
