<?php

namespace App\Services;

use App\Repositories\UserObjectRepository;

class UserObjectService extends BaseService
{
    public function __construct(UserObjectRepository $repo)
    {
        $this->repo = $repo;
    }
}
