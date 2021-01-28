<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseService
{
    /**
     * Repository
     *
     * @var Repository
     */
    public $repo;

    /**
     * Get all data
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->repo->all();
    }

    /**
     * Create new record
     *
     * @param array $input
     * @return model
     */
    public function create(array $data): Model
    {
        return $this->repo->create($data);
    }

    /**
     * Find record by id
     *
     * @param int $id
     * @return Model
     */
    public function findById(int $id): Model
    {
        return $this->repo->findById($id);
    }

    /**
     * Update data
     *
     * @param integer $id
     * @param array $data
     * @return boolean
     */
    public function update(string $id, array $data): bool
    {
        return $this->repo->update($id, $data);
    }

    /**
     * Delete record by id
     *
     * @param integer $id
     * @return boolean
     */
    public function destroy(string $id): bool
    {
        return $this->repo->destroy($id);
    }

    /**
     * count records
     *
     * @return integer
     */
    public function count(): int
    {
        return $this->repo->count();
    }

}
