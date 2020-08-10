<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class Authenticate extends Middleware
{
    public const ROUTE_PUBLIC_PREFIX = 'public.';
    public const ROUTE_ROLE_PREFIX = 'role.';

    /**
     * We override this method to make it available to send information about "Guest" role
     * Anonymous users instead of 401 http code will receive information about "Guest" role
     *
     * @param Request $request
     * @param Closure $next
     * @param string[] ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        try {
            $this->authenticate($request, $guards);
        } catch (AuthenticationException $exception) {
            if ($this->isRoleRequestingRoute($request)) {
                return new JsonResponse([Role::findByName(User::USER_ROLE_GUEST)->toArray()]);
            }
        }

        return $next($request);
    }

    /**
     * @param Request $request
     * @param array $guards
     * @throws AuthenticationException
     * @return void
     */
    protected function authenticate($request, array $guards)
    {
        if (empty($guards)) {
            $guards = [null];
        }

        foreach ($guards as $guard) {
            if ($this->auth->guard($guard)->check()) {
                $this->auth->shouldUse($guard);
                return;
            }
        }

        if ($this->isPublicRoute($request) && !$this->isRoleRequestingRoute($request)) {
            return;
        }

        $this->unauthenticated($request, $guards);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
    }

    /**
     * @param Request $request
     * @return bool
     */
    private function isRoleRequestingRoute(Request $request): bool
    {
        if ($this->isUnnamedRoute($request)) {
            return false;
        }

        return strpos((string)$request->route()->getName(), self::ROUTE_ROLE_PREFIX) !== false;
    }

    /**
     * @param Request $request
     * @return bool
     */
    private function isPublicRoute(Request $request): bool
    {
        if ($this->isUnnamedRoute($request)) {
            return false;
        }

        return strpos((string)$request->route()->getName(), self::ROUTE_PUBLIC_PREFIX) !== false;
    }

    /**
     * @param Request $request
     * @return bool
     */
    private function isUnnamedRoute(Request $request)
    {
        $routeName = $request->route()->getName();

        return null === $routeName;
    }
}
