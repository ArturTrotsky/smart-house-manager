<?php

namespace App\Repositories;

use App\Models\Schedulers;

class SchedulersRepository extends BaseRepository
{
    /**
     * Repo Constructor
     * Override to clarify typehinted model.
     * @param Schedulers $model Repo DB ORM Model
     */
    public function __construct(Schedulers $model)
    {
        $this->model = $model;
    }

    /**
     * Show the record with the given module_id
     *
     * @param int $module_id
     * @return model
     */
    public function findByModuleId(int $module_id)
    {
        return $this->model->where('module_id', $module_id)->first();
    }
}
