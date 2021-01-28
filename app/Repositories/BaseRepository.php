<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Interfaces\BaseInterface;
use Illuminate\Support\Collection;

abstract class BaseRepository implements BaseInterface
{
    protected $model;

    public $sortBy = 'name';
    public $sortOrder = 'asc';

    /**
     * Repo Constructor
     * Override to clarify typehinted model.
     * @param Model $model Repo DB ORM Model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all instances of model
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model
            ->orderBy($this->sortBy, $this->sortOrder)
            ->get();
    }

    /**
     * Create a new record in the database
     *
     * @param array $data
     * @return model
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update record in the database and get data back
     *
     * @param int $id
     * @param array $data
     * @return boolean
     */
    public function update(int $id, array $data): bool
    {
        $query = $this->model->where('id', $id);
        return $query->update($data);
    }

    /**
     * Remove record from the database
     *
     * @param int $id
     * @return boolean
     */
    public function destroy(int $id): bool
    {
        $this->model->destroy($id);
        return true;
    }

    /**
     * Show the record with the given id
     *
     * @param int $id
     * @return model
     */
    public function findById(int $id)
    {
        return $this->model->find($id);
    }

    /**
     * Get the associated model
     *
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * Set the associated model
     *
     * @param $model
     * @return $this
     */
    public function setModel(Model $model)
    {
        $this->model = $model;
        return true;
    }

    /**
     * Get count of model
     *
     * @return integer
     */
    public function count(): int
    {
        return $this->model->count();
    }
}
