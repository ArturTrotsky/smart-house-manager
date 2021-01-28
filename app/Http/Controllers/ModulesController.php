<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModulesRequest;
use App\Models\ModuleParams;
use App\Models\Modules;
use App\Models\ModuleTypes;
use App\Models\Schedulers;
use App\Models\UserObject;

class ModulesController extends Controller
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
    public function create($object_id)
    {
        $moduleTypes = ModuleTypes::all()->sortBy('name');
        $object = UserObject::find($object_id);

        return view('modules.create', compact('moduleTypes', 'object'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModulesRequest $request)
    {
        $module = new Modules([
            'module_type_id' => $request->input('module_type_id'),
            'object_id' => $request->input('object_id'),
            'name' => $request->input('name'),
            'ip_adress' => $request->input('ip_adress'),
        ]);
        $module->save();

        $moduleParams = new ModuleParams([
            'module_id' => $module->id,
        ]);
        $moduleParams->save();

        return redirect()->route('modules.show', $module->id)
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
        $module = Modules::find($id);
        $scheduler = Schedulers::where('module_id', $module->id)->first();
        $moduleParams = ModuleParams::withTrashed()->where('module_id', $id)->get();

        return view('modules.show', compact('module', 'scheduler', 'moduleParams'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module = Modules::find($id);
        $moduleTypes = ModuleTypes::all()->sortBy('name');

        return view('modules.edit', compact('module', 'moduleTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModulesRequest $request, $id)
    {
        $module = Modules::find($id);
        $module->module_type_id = $request->input('module_type_id');
        $module->name = $request->input('name');
        $module->ip_adress = $request->input('ip_adress');
        $module->save();

        return redirect()->route('modules.show', $module->id)->with('success', "You have successfully updated the " . $module->name . " module");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $module = Modules::find($id);
        $objectId = $module->object_id;
        $module->delete();

        return redirect()->route('objects.show', $objectId)->with('success', 'Module deleted!');
    }
}
