<?php

namespace App\Repositories;

use App\Models\ModuleParams;

class ModuleParamsRepository extends BaseRepository
{
    /**
     * Repo Constructor
     * Override to clarify typehinted model.
     * @param ModuleParams $model Repo DB ORM Model
     */
    public function __construct(ModuleParams $model)
    {
        $this->model = $model;
    }
}
