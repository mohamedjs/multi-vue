<?php

namespace App\Policies;

use App\Constants\UserTypes;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the setting index.
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
     * Determine whether the user can view the setting index.
     *
     * @param User $user
     * @return bool
     */
    public function index(User $user)
    {
        return $user->hasAccess("admin.settings.index");
    }

    /**
     * Determine whether the user can update the setting.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Setting  $setting
     * @return mixed
     */
    public function update(User $user, Setting $setting)
    {
        return $user->hasAccess("admin.settings.edit");
    }
}
