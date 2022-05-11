<?php

namespace App\Actions;

use App\Models\User;

class GetAllUsers
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function __invoke()
    {
        return $this->user::query()->get();
    }
}
