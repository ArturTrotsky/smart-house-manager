<?php

namespace App\Services;

use App\Repositories\ModulesRepository;
use Illuminate\Database\Eloquent\Model;

class ModulesService extends BaseService
{
    public function __construct(ModulesRepository $repo)
    {
        $this->repo = $repo;
    }
}
