<?php

namespace App\Services;

use App\Repositories\ModuleParamsRepository;
use Illuminate\Database\Eloquent\Collection;

class ModuleParamsService extends BaseService
{
    public function __construct(ModuleParamsRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     *
     *
     * @return Collection
     */
    public function findByModuleIdWithTrashed(int $id): Collection
    {
        return $this->repo->findByModuleIdWithTrashed($id);
    }

    public function getDataForCharts(int $id): array
    {
        $moduleParams = $this->repo->findByModuleIdWithTrashed($id);
        foreach ($moduleParams as $key => $item) {
            $data[$key]['value'] = $item->value;
            $data[$key]['date'] = $item->created_at->format('Y-m-d H:i:s');
            if ($key == count($moduleParams) - 1) {
                $data[count($moduleParams)]['value'] = $item->value;
                $data[count($moduleParams)]['date'] = now()->format('Y-m-d H:i:s');
            }
        }

        return $data;
    }
}
