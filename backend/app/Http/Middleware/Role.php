<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class Role
{
    /**
     * @var Guard
     */
    private $guard;

    /**
     * Role constructor.
     * @param  Guard  $guard
     */
    public function __construct(Guard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @param  array  $roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        /** @var User $user */
        $user = $this->guard->user();

        if ($user === null) {
            throw new AccessDeniedHttpException();
        }

        if ($user->hasRole([User::USER_ROLE_ADMIN])) {
            return $next($request);
        }

        foreach ($roles as $role) {
            if ($user->hasRole($role)) {
                return $next($request);
            }
        }

        throw new AccessDeniedHttpException();
    }
}
