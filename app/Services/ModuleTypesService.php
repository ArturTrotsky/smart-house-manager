<?php

namespace App\Services;

use App\Repositories\ModuleTypesRepository;

class ModuleTypesService extends BaseService
{
    public function __construct(ModuleTypesRepository $repo)
    {
        $this->repo = $repo;
    }
}
