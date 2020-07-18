<?php

namespace App\Policies;

use App\Constants\UserTypes;
use App\Models\ContactUs;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactUsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the country index.
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
     * Determine whether the user can view the country index.
     *
     * @param User $user
     * @return bool
     */
    public function index(User $user)
    {
        return $user->hasAccess("admin.contact.us.index");
    }

    public function show(User $user)
    {
        return $user->hasAccess("admin.contact.us.show");

    }

    public function delete(User $user, ContactUs $contactUs)
    {
        return $user->hasAccess("admin.contact.us.destroy");

    }
}
