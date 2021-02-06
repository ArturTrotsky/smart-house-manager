<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchedulersRequest;
use App\Services\ModulesService;
use App\Services\SchedulersService;

class SchedulerController extends Controller
{
    public function __construct(SchedulersService $schedulers, ModulesService $modules)
    {
        $this->schedulers = $schedulers;
        $this->modules = $modules;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($moduleId)
    {
        return view('schedulers.create', [
            'module' => $this->modules->findById($moduleId)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchedulersRequest $request)
    {
        $period = $request->input('period');
        $$period = true;

        $scheduler = $this->schedulers->create([
            'module_id' => $request->input('module_id'),
            'value' => $request->input('value'),
            'on_time' => $request->get('on_time'),
            'off_time' => $request->input('off_time'),
            'every_day' => $every_day ?? 0,
            'every_week' => $every_week ?? 0,
            'every_work_day' => $every_work_day ?? 0,
            'weekend' => $weekend ?? 0,
        ]);

        return redirect()->route('modules.show', $scheduler->module_id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($moduleId)
    {
        return view('schedulers.index', [
            'module' => $this->modules->findById($moduleId)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scheduler = $this->schedulers->findById($id);

        return view('schedulers.edit', [
            'scheduler' => $scheduler,
            'schedulerPeriodColumnName' => $this->schedulers->periodColumnName($scheduler),
            'schedulerPeriodColumnValue' => $this->schedulers->periodColumnValue($scheduler)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SchedulersRequest $request, $id)
    {
        $period = $request->input('period');
        $$period = true;

        $this->schedulers->update($id, [
            'module_id' => $request->input('module_id'),
            'value' => $request->input('value'),
            'on_time' => $request->input('on_time'),
            'off_time' => $request->input('off_time'),
            'every_day' => $every_day ?? 0,
            'every_week' => $every_week ?? 0,
            'every_work_day' => $every_work_day ?? 0,
            'weekend' => $weekend ?? 0,
        ]);

        return redirect()->route('modules.show', $request->input('module_id'))
            ->with('success_scheduler', "You have successfully updated scheduler");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scheduler = $this->schedulers->findById($id);
        $moduleId = $scheduler->module_id;

        $this->schedulers->destroy($id);

        return redirect()->route('modules.show', $moduleId)
            ->with('success_scheduler', 'Scheduler deleted!');
    }
}
