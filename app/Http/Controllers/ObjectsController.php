<?php

namespace App\Http\Controllers;

use App\Http\Requests\ObjectsRequest;
use App\Services\ObjectsService;
use App\Services\UserObjectService;
use Illuminate\Support\Facades\Auth;

class ObjectsController extends Controller
{
    public function __construct(UserObjectService $userObjects, ObjectsService $objects)
    {
        $this->userObjects = $userObjects;
        $this->objects = $objects;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('objects.index', [
            'objects' => $this->userObjects->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('objects.create', [
            'objects' => $this->objects->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ObjectsRequest $request)
    {
        $userObject = $this->userObjects->create([
            'name' => $request->input('name'),
            'user_id' => Auth::id()
        ]);

        return redirect()->route('objects.index')
            ->with('success', "You have successfully added a " . $userObject->name . " object");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('objects.show', [
            'object' => $this->userObjects->findById($id)
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
        return view('objects.edit', [
            'object' => $this->userObjects->findById($id)
        ]);
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
        $this->userObjects->update(
            $id,
            ['name' => $request->input('name')]
        );
        $userObject = $this->userObjects->findById($id);

        return redirect()->route('objects.index')
            ->with('success', "You have successfully updated the " . $userObject->name . " object");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userObjects->destroy($id);

        return redirect()->route('objects.index')
            ->with('success', 'Object deleted!');
    }
}
