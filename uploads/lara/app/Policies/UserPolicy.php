<?php

namespace App\Policies;

use App\Constants\UserTypes;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the  index.
     *
     * @param User $user
     * @return bool
     */
    public function index(User $user)
    {
        return $user->hasAccess("admin.users.index");
    }

    /**
     * Determine whether the user can view the  index.
     *
     * @param User $user
     * @return bool
     */
    public function admin(User $user)
    {
        return $user->hasAccess("admin.users.index.admin");
    }


    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasAccess("admin.users.create");
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  User  $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        return $user->hasAccess("admin.users.edit");
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        return $user->hasAccess("admin.users.destroy");
    }

    /**
     * Determine whether the user can change password of the users.
     *
     * @param  User  $user
     * @param  User  $model
     * @return boolean
     */
    public function changePassword(User $user, User $model)
    {
        return $user->hasAccess("admin.users.edit.password");
    }

    /**
     * @param User $user
     * @return bool
     */
    public function users(User $user)
    {
        return $user->hasAccess("admin.reports.users");
    }

    /**
     * @param User $user
     * @return bool
     */
    public function providers(User $user)
    {
        return $user->hasAccess("admin.reports.providers");
    }

    /**
     * @param User $user
     * @return bool
     */
    public function financials(User $user)
    {
        return $user->hasAccess("admin.reports.financials");
    }

    /**
     * @param User $user
     * @return bool
     */
    public function cities(User $user)
    {
        return $user->hasAccess("admin.reports.cities");
    }
}
