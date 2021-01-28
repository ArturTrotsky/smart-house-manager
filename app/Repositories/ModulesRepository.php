<?php

namespace App\Repositories;

use App\Models\Modules;

class ModulesRepository extends BaseRepository
{
    /**
     * Repo Constructor
     * Override to clarify typehinted model.
     * @param Modules $model Repo DB ORM Model
     */
    public function __construct(Modules $model)
    {
        $this->model = $model;
    }
}
