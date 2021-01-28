<?php

namespace App\Console\Commands;

use App\Models\ModuleParams;
use App\Models\Schedulers;
use Carbon\Carbon;
use Illuminate\Console\Command;

class PerformTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'perform:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description'; /*TODO: Change*/

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $nowTime = Carbon::now()->format('H:i:00');
        $numberDayOnWeek = Carbon::now()->dayOfWeek;

        $plans = Schedulers::where('on_time', $nowTime)
            ->orWhere('off_time', $nowTime)->get();

        foreach ($plans as $plan) {
            if ($plan->on_time == $nowTime || $plan->off_time == $nowTime) {
                if (
                    ($plan->every_day == 1) ||
                    ($plan->every_week == 1 && $numberDayOnWeek == 1) ||
                    ($plan->every_work_day == 1 && in_array($numberDayOnWeek, [1, 2, 3, 4, 5])) ||
                    ($plan->weekend == 1 && in_array($numberDayOnWeek, [6, 0]))
                ) {
                    $moduleParams = ModuleParams::where('module_id', $plan->module_id)->first();
                    $moduleParams->delete();

                    if ($plan->on_time == $nowTime) {
                        $newModuleParams = new ModuleParams([
                            'module_id' => $plan->module_id,
                            'value' => $plan->value,
                        ]);
                    }
                    if ($plan->off_time == $nowTime) {
                        $newModuleParams = new ModuleParams([
                            'module_id' => $plan->module_id,
                            'value' => 0,
                        ]);
                    }

                    $newModuleParams->save();
                }
            }
        }
    }
}
