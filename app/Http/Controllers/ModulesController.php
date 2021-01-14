<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModulesRequest;
use App\Models\Modules;
use App\Models\ModuleTypes;
use Illuminate\Http\Request;

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

        return view('modules.create', compact('moduleTypes', 'object_id'));
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
            'module_type_id' => $request->get('module_type_id'),
            'object_id' => $request->get('object_id'),
            'name' => $request->get('name'),
            'ip_adress' => $request->get('ip_adress'),
        ]);
        $module->save();

        return redirect("/objects/{$module->object_id}")
            ->with('success', "You have successfully added a \"$module->name\" module");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $module->update($request->all());

        return redirect("/objects/{$module->object_id}")->with('success', "You have successfully updated the \"$module->name\" module");
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

        return redirect("/objects/$objectId")->with('success', 'Object deleted!');
    }
}
