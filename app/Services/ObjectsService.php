<?php

namespace App\Services;

use App\Repositories\ObjectsRepository;

class ObjectsService extends BaseService
{
    public function __construct(ObjectsRepository $repo)
    {
        $this->repo = $repo;
    }
}
