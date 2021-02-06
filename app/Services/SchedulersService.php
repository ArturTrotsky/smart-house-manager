<?php

namespace App\Services;

use App\Models\Schedulers;
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

    public function periodColumnName(Schedulers $scheduler): string
    {
        $arrPeriodColumnNames = ['every_day' => $scheduler->every_day, 'every_week' => $scheduler->every_week,
            'every_work_day' => $scheduler->every_work_day, 'weekend' => $scheduler->weekend];
        arsort($arrPeriodColumnNames);

        return array_key_first($arrPeriodColumnNames);
    }

    public function periodColumnValue(Schedulers $scheduler): string
    {
        $arrPeriodColumnValues = ['Every day' => $scheduler->every_day, 'Every week' => $scheduler->every_week,
            'Every work day' => $scheduler->every_work_day, 'Every weekend' => $scheduler->weekend];
        arsort($arrPeriodColumnValues);

        return array_key_first($arrPeriodColumnValues);
    }
}
