<?php

namespace App\Http\Controllers;

use App\Models\UserObject;
use Illuminate\Http\Request;
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
        return view('objects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $object = new UserObject([
            'name' => $request->get('name'),
            'user_id' => Auth::user()->id
        ]);
        $object->save();

        return redirect('/objects')->with('success', "You have successfully added a \"$object->name\" object");
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $object = UserObject::find($id);
        $object->update($request->all());

        return redirect('/objects')->with('success', "You have successfully updated the \"$object->name\" object");
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

        return redirect('/objects')->with('success', 'Object deleted!');
    }
}
