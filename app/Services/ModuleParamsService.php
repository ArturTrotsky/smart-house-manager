<?php

namespace App\Services;

use App\Repositories\ModuleParamsRepository;

class ModuleParamsService extends BaseService
{
    public function __construct(ModuleParamsRepository $repo)
    {
        $this->repo = $repo;
    }
}
