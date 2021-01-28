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
}
