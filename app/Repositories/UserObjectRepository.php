<?php

namespace App\Repositories;

use App\Models\UserObject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

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

    public function all(): Collection
    {
        return $this->model
            ->currentUser()
            ->orderBy($this->sortBy, $this->sortOrder)
            ->get();
    }

    /**
     * Show the record with the given id
     *
     * @param int $id
     * @return model
     */
    public function findById(int $id)
    {
        return $this->model->currentUser()->find($id);
    }

    /**
     * Remove record from the database
     *
     * @param int $id
     * @return boolean
     */
    public function destroy(int $id): bool
    {
        $this->model->currentUser()->destroy($id);
        return true;
    }
}
