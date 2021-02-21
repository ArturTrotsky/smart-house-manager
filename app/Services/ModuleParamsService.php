<?php

namespace App\Services;

use App\Repositories\ModuleParamsRepository;
use Carbon\Carbon;
use Exception;

class ModuleParamsService extends BaseService
{
    public function __construct(ModuleParamsRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getDataForCharts(int $id, $dateTimeFrom, $dateTimeTo)
    {
        try {
            $from = Carbon::CreateFromFormat('m/d/Y h:i A', $dateTimeFrom)->format('Y-m-d H:i:s');
            $to = Carbon::CreateFromFormat('m/d/Y h:i A', $dateTimeTo)->format('Y-m-d H:i:s');

            $moduleParams = $this->repo->findByModuleIdWithTrashed($id, $from, $to);

            if ($moduleParams->isEmpty()) {
                throw new Exception();
            }

            foreach ($moduleParams as $key => $item) {
                $data[$key]['value'] = $item->value;
                $data[$key]['date'] = $item->created_at->format('Y-m-d H:i:s');
                if ($key == count($moduleParams) - 1) {
                    $data[count($moduleParams)]['value'] = $item->value;
                    $data[count($moduleParams)]['date'] = now()->format('Y-m-d H:i:s');
                }
            }

            session()->forget('errorDataForChart');

            return $data;
        } catch (Exception $exception) {
            return back()->withError($exception->getMessage())
                ->with('errorDataForChart', "Change the date interval. Data not found.");
        }
    }
}
