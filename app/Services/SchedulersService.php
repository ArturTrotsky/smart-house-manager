<?php

namespace App\Services;

use App\Repositories\SchedulersRepository;

class SchedulersService extends BaseService
{
    public function __construct(SchedulersRepository $repo)
    {
        $this->repo = $repo;
    }
}
