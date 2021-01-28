<?php

namespace App\Services;

use App\Repositories\ModulesRepository;

class ModulesService extends BaseService
{
    public function __construct(ModulesRepository $repo)
    {
        $this->repo = $repo;
    }
}
