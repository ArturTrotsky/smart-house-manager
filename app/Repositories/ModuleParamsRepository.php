<?php

namespace App\Repositories;

use App\Models\ModuleParams;
use Illuminate\Database\Eloquent\Collection;

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

    /**
     *
     *
     * @return array
     */
    public function findByModuleIdWithTrashed(int $id): Collection
    {
        return $this->model->withTrashed()->where('module_id', $id)->get();
    }
}
