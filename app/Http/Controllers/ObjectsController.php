<?php

namespace App\Http\Controllers;

use App\Http\Requests\ObjectsRequest;
use App\Models\Objects;
use App\Models\UserObject;
use Illuminate\Support\Facades\Auth;

class ObjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objects = UserObject::all()->sortBy('name');
        return view('objects.index', compact('objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $objects = Objects::all()->sortBy('name');
        return view('objects.create', compact('objects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ObjectsRequest $request)
    {
        $object = new UserObject([
            'name' => $request->input('name'),
            'user_id' => Auth::id()
        ]);
        $object->save();

        return redirect()->route('objects.index')->with('success', "You have successfully added a " . $object->name . " object");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $object = UserObject::find($id);

        return view('objects.show', compact('object'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = UserObject::find($id);

        return view('objects.edit', compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ObjectsRequest $request, $id)
    {
        $object = UserObject::find($id);
        $object->update(['name' => $request->input('name')]);

        return redirect()->route('objects.index')->with('success', "You have successfully updated the " . $object->name . " object");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $object = UserObject::find($id);
        $object->delete();

        return redirect()->route('objects.index')->with('success', 'Object deleted!');
    }
}
