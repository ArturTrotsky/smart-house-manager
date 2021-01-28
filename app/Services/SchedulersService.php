<?php

namespace App\Services;

use App\Repositories\SchedulersRepository;

class SchedulersService extends BaseService
{
    public function __construct(SchedulersRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Show the record with the given module_id
     *
     * @param int $module_id
     * @return object
     */
    public function findByModuleId(int $module_id)
    {
        return $this->repo->findByModuleId($module_id);
    }
}
