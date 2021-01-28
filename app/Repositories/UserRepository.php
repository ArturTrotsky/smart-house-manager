<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    /**
     * Repo Constructor
     * Override to clarify typehinted model.
     * @param User $model Repo DB ORM Model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}
