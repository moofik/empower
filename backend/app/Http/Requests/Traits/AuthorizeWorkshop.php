<?php


namespace App\Http\Requests\Traits;


use App\User;
use Illuminate\Http\Request;

/**
 * @mixin Request
 */
trait AuthorizeWorkshop
{
    /**
     * @var User
     */
    public $user;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /** @var User|null $user */
        $user = $this->user();
        $isWorkshop = $user->roles()->where('name', User::USER_ROLE_SHOP);
        $isAdmin = $user->roles()->where('name', User::USER_ROLE_ADMIN);

        $this->user = $user;

        return null !== $user && ($isWorkshop || $isAdmin);
    }
}
