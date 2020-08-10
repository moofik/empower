<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticationUser;
use App\Http\Requests\RegisterUser;
use App\Http\Requests\RegisterShop;
use App\Service\Api\Problem;
use App\Service\Api\ProblemException;
use App\Service\Registration\UserMaker;
use App\Service\Security\PassportJwtTokenFactory;
use App\Service\Registration\ShopMaker;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Http\JsonResponse;
use Laravel\Passport\Token;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    /**
     * @param  AuthenticationUser  $request
     * @param  PassportJwtTokenFactory  $factory
     * @return string
     */
    public function login(AuthenticationUser $request, PassportJwtTokenFactory $factory)
    {
        return $factory->getToken($request->username, $request->password);
    }

    /**
     * @param  RegisterShop  $request
     * @param  ShopMaker  $workshopMaker
     * @return User
     */
    public function registerShop(RegisterShop $request, ShopMaker $workshopMaker)
    {
        $workshop = $workshopMaker->createUser($request);

        return $workshop;
    }

    /**
     * @param  RegisterUser  $request
     * @param  UserMaker  $userMaker
     * @return User
     */
    public function registerUser(RegisterUser $request, UserMaker $userMaker)
    {
        $user = $userMaker->createUser($request);

        return $user;
    }

    /**
     * @param  Guard  $guard
     * @return array
     */
    public function fetchRole(Guard $guard)
    {
        /** @var User $user */
        $user = $guard->user();
        $roles = $user->roles->toArray();

        return $roles;
    }

    /**
     * @param  Guard  $guard
     * @return JsonResponse
     */
    public function logout(Guard $guard)
    {
        $user = $guard->user();

        if (!$user instanceof User) {
            $problem = new Problem(401);
            throw new ProblemException($problem);
        }

        $user->tokens()->each(
            function (Token $token, $key) {
                $token->delete();
            }
        );

        return new JsonResponse([], 204);
    }
}
