<?php

namespace App\Repositories;

use App\Models\UserObject;

class UserObjectRepository extends BaseRepository
{
    /**
     * Repo Constructor
     * Override to clarify typehinted model.
     * @param UserObject $model Repo DB ORM Model
     */
    public function __construct(UserObject $model)
    {
        $this->model = $model;
    }
}
