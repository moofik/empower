<?php


namespace App\Service\Registration;

use App\Http\Requests\Admin\CreateUser;
use App\Http\Requests\Admin\UpdateUser;
use App\Http\Requests\ProblemAwareRequest;
use App\Http\Requests\RegisterUser;
use App\User;
use Illuminate\Contracts\Hashing\Hasher;

class UserMaker
{
    /**
     * @var Hasher
     */
    private $hasher;

    /**
     * WorkshopMaker constructor.
     * @param  Hasher  $hasher
     */
    public function __construct(Hasher $hasher)
    {
        $this->hasher = $hasher;
    }

    /**
     * @param CreateUser|RegisterUser $request
     * @return User
     */
    public function createUser(ProblemAwareRequest $request): User
    {
        $user = $this->createDefaultUser($request);
        $user->assignRole(User::USER_ROLE_USER);
        $user->save();

        return $user;
    }

    /**
     * @param CreateUser $request
     * @return User
     */
    public function createAdmin(CreateUser $request): User
    {
        $user = $this->createDefaultUser($request);
        $user->assignRole(User::USER_ROLE_MODERATOR);
        $user->save();

        return $user;
    }

    /**
     * @param UpdateUser $updateUser
     * @param int $userId
     * @return User
     */
    public function updateUser(UpdateUser $updateUser, int $userId): User
    {
        $user = $this->fillUserFieldsFromRequest(User::findOrFail($userId), $updateUser);
        $user->save();

        return $user;
    }

    /**
     * @param ProblemAwareRequest $request
     * @return User
     */
    private function createDefaultUser(ProblemAwareRequest $request)
    {
        $user = new User();
        $this->fillUserFieldsFromRequest($user, $request);
        $user->is_workshop = false;

        return $user;
    }

    /**
     * @param User $user
     * @param ProblemAwareRequest $request
     * @return User
     */
    private function fillUserFieldsFromRequest(User $user, ProblemAwareRequest $request)
    {
        $user->password = $this->hasher->make($request->password);
        $user->full_name = $request->fullName;
        $user->email = $request->email;
        $user->city = $request->city;

        return $user;
    }
}
