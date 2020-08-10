<?php

namespace App\Http\Controllers\Admin;

use App\Filter\ValueFilterFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUser;
use App\Http\Requests\Admin\UpdateUser;
use App\Repository\UserRepository;
use App\Service\Registration\UserMaker;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Moofik\LaravelResourceExtenstion\Extension\ExtendableResourceCollection;
use Moofik\LaravelResourceExtenstion\Extension\RestrictableResource;

class AdminUsersController extends Controller
{
    /**
     * @param Request $request
     * @param UserRepository $repository
     * @return ExtendableResourceCollection
     */
    public function admins(Request $request, UserRepository $repository)
    {
        $filter = ValueFilterFactory::createFromRequest($request);
        $admins = $repository->findUsersWithRoleAndFilter(User::USER_ROLE_MODERATOR, $filter);

        return ExtendableResourceCollection::extendableCollection($admins);
    }

    /**
     * @param CreateUser $createAdminRequest
     * @param UserMaker $userMaker
     * @return RestrictableResource
     */
    public function createAdmin(CreateUser $createAdminRequest, UserMaker $userMaker): RestrictableResource
    {
        $user = $userMaker->createAdmin($createAdminRequest);

        return RestrictableResource::make($user);
    }

    /**
     * @param int $userId
     * @return RestrictableResource
     */
    public function admin(int $userId): RestrictableResource
    {
        return RestrictableResource::make(User::findOrFail($userId));
    }

    /**
     * @param int $userId
     * @param UpdateUser $createAdminUser
     * @param UserMaker $userMaker
     * @return RestrictableResource
     */
    public function editAdmin(int $userId, UpdateUser $createAdminUser, UserMaker $userMaker): RestrictableResource
    {
        $user = $userMaker->updateUser($createAdminUser, $userId);

        return RestrictableResource::make($user);
    }

    /**
     * @param int $userId
     * @return JsonResponse
     */
    public function deleteAdmin(int $userId): JsonResponse
    {
        User::destroy($userId);

        return new JsonResponse();
    }
}
