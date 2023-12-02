<?php

namespace App\Policies;

use App\Models\User;

class OfferPolicy
{
    public function create(User $user)
    {
        return $user->role === 'user';
    }
}
