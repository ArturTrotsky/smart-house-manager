<?php

namespace App\Repositories;

use App\Models\Modules;
use App\Models\UserObject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ModulesRepository extends BaseRepository
{
    /**
     * Repo Constructor
     * Override to clarify typehinted model.
     * @param Modules $model Repo DB ORM Model
     */
    public function __construct(Modules $model, UserObjectRepository $userObjectRepository)
    {
        $this->model = $model;
        $this->userObjectRepository = $userObjectRepository;
    }

    /**
     * Show the record with the given id
     *
     * @param int $id
     * @return model
     */
    public function findById(int $id)
    {
        $currentUserObjectIds = $this->userObjectRepository->all()->pluck('id')->toArray();
        return $this->model->whereIn('object_id', $currentUserObjectIds)->find($id);
    }
}
