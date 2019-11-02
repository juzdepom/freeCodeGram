<?php

namespace App\Policies;

use App\Profile;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Profile $profile)
    {
        //
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Profile $profile)
    {
        return $user->id == $profile->user_id;
    }
    
    public function delete(User $user, Profile $profile)
    {
        //
    }

    public function restore(User $user, Profile $profile)
    {
        //
    }
    public function forceDelete(User $user, Profile $profile)
    {
        //
    }
}
