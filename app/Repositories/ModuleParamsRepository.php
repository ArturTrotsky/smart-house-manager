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

    public function findByModuleIdWithTrashed(int $id, string $from, string $to): Collection
    {
        return $this->model->withTrashed()
            ->whereBetween('created_at', [$from, $to])
            ->where('module_id', $id)
            ->get();
    }
}
