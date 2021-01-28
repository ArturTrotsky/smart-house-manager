<?php

namespace App\Repositories;

use App\Models\Objects;

class ObjectsRepository extends BaseRepository
{
    /**
     * Repo Constructor
     * Override to clarify typehinted model.
     * @param Objects $model Repo DB ORM Model
     */
    public function __construct(Objects $model)
    {
        $this->model = $model;
    }
}
