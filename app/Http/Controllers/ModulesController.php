<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModulesStoreRequest;
use App\Http\Requests\ModulesUpdateRequest;
use App\Models\ModuleParams;
use App\Models\Modules;
use App\Services\ModuleParamsService;
use App\Services\ModulesService;
use App\Services\ModuleTypesService;
use App\Services\SchedulersService;
use App\Services\UserObjectService;

class ModulesController extends Controller
{
    public function __construct(
        ModuleTypesService $moduleTypes,
        UserObjectService $objects,
        ModulesService $modules,
        ModuleParamsService $moduleParams,
        SchedulersService $schedulers
    )
    {
        $this->moduleTypes = $moduleTypes;
        $this->objects = $objects;
        $this->modules = $modules;
        $this->moduleParams = $moduleParams;
        $this->schedulers = $schedulers;
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
    public function create($objectId)
    {
        return view('modules.create', [
            'moduleTypes' => $this->moduleTypes->all(),
            'object' => $this->objects->findById($objectId)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModulesStoreRequest $request)
    {
        $module = $this->modules->create([
            'module_type_id' => $request->input('module_type_id'),
            'object_id' => $request->input('object_id'),
            'name' => $request->input('name'),
            'ip_adress' => $request->input('ip_adress'),
        ]);

        $this->moduleParams->create([
            'module_id' => $module->id,
        ]);

        $object = $this->objects->findById($module->object_id);

        return redirect()->route('objects.show', $object)
            ->with('success', "You have successfully added a " . $module->name . " module");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $module = $this->modules->findById($id);
        $scheduler = $this->schedulers->findByModuleId($module->id);

        $dataForChart = $this->moduleParams->getDataForCharts($id);

        return view('modules.show',
            compact('module', 'scheduler', 'dataForChart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('modules.edit', [
            'module' => $this->modules->findById($id),
            'moduleTypes' => $this->moduleTypes->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModulesUpdateRequest $request, Modules $module)
    {
        $this->modules->update($module->id, [
            'module_type_id' => $request->input('module_type_id'),
            'name' => $request->input('name'),
            'ip_adress' => $request->input('ip_adress'),
        ]);

        return redirect()->route('modules.show', $module->id)
            ->with('success', "You have successfully updated the " . $module->name . " module");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = $this->modules->findById($id);
        $objectId = $module->object->id;

        $this->modules->destroy($id);

        return redirect()->route('objects.show', $objectId)
            ->with('success', 'Module deleted!');
    }
}
