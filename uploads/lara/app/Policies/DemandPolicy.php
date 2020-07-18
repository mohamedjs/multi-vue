<?php

namespace App\Policies;

use App\Constants\UserTypes;
use App\Models\Demand;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DemandPolicy
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
        return $user->hasAccess("admin.demands.index");
    }

    /**
     * Determine whether the user can create category.
     *
     * @param User $user
     * @param Demand $demand
     * @return mixed
     */
    public function show(User $user, Demand $demand)
    {
        return $user->hasAccess("admin.demands.show");
    }

    /**
     * Determine whether the user can update the category.
     *
     * @param User $user
     * @param Demand $demand
     * @return mixed
     */
    public function update(User $user, Demand $demand)
    {
        return $user->hasAccess("admin.demands.edit");
    }

    /**
     * Determine whether the user can delete the category.
     *
     * @param User $user
     * @param Demand $demand
     * @return mixed
     */
    public function delete(User $user, Demand $demand)
    {
        return $user->hasAccess("admin.demands.destroy");
    }
}
