<?php

namespace App\Policies;

use App\Constants\UserTypes;
use App\Models\City;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProviderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the category index.
     *
     * @param User $user
     * @return bool
     */
    public function before(User $user)
    {
        if (!$user->isTypeOf(UserTypes::ADMIN)) {
            return false;
        }
    }

    /**
     * Determine whether the user can view the category index.
     *
     * @param User $user
     * @return bool
     */
    public function index(User $user)
    {
        return $user->hasAccess("admin.providers.index");
    }

    /**
     * Determine whether the user can create category.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasAccess("admin.providers.create");
    }

    /**
     * Determine whether the user can update the category.
     *
     * @param User $user
     * @param Provider $provider
     * @return mixed
     */
    public function update(User $user, Provider $provider)
    {
        return $user->hasAccess("admin.providers.edit");
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param User $user
     * @param Provider $provider
     * @return mixed
     */
    public function delete(User $user, Provider $provider)
    {
        return $user->hasAccess("admin.providers.destroy");
    }
}
