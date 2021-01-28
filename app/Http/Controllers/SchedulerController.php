<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchedulersRequest;
use App\Models\Modules;
use App\Models\Schedulers;

class SchedulerController extends Controller
{
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
        $module = Modules::find($moduleId);

        return view('schedulers.create', compact('module'));
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

        $scheduler = new Schedulers([
            'module_id' => $request->input('module_id'),
            'value' => $request->input('value'),
            'on_time' => $request->get('on_time'),
            'off_time' => $request->input('off_time'),
            'every_day' => $every_day ?? 0,
            'every_week' => $every_week ?? 0,
            'every_work_day' => $every_work_day ?? 0,
            'weekend' => $weekend ?? 0,
        ]);

        $scheduler->save();

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
        $module = Modules::find($moduleId);

        return view('schedulers.index', compact('module'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scheduler = Schedulers::find($id);

        return view('schedulers.edit', compact('scheduler'));
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
        $scheduler = Schedulers::find($id);
        $period = $request->input('period');
        $$period = true;

        $scheduler->update([
            'module_id' => $request->input('module_id'),
            'value' => $request->input('value'),
            'on_time' => $request->input('on_time'),
            'off_time' => $request->input('off_time'),
            'every_day' => $every_day ?? 0,
            'every_week' => $every_week ?? 0,
            'every_work_day' => $every_work_day ?? 0,
            'weekend' => $weekend ?? 0,
        ]);

        return redirect()->route('modules.show', $scheduler->module_id)
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
        $scheduler = Schedulers::find($id);
        $moduleId = $scheduler->module_id;
        $scheduler->delete();

        return redirect()->route('modules.show', $moduleId)->with('success_scheduler', 'Scheduler deleted!');
    }
}
