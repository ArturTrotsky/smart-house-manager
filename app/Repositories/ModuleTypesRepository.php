<?php

namespace App\Repositories;

use App\Models\ModuleTypes;

class ModuleTypesRepository extends BaseRepository
{
    /**
     * Repo Constructor
     * Override to clarify typehinted model.
     * @param ModuleTypes $model Repo DB ORM Model
     */
    public function __construct(ModuleTypes $model)
    {
        $this->model = $model;
    }
}
