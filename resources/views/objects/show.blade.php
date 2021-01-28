@extends('layouts.layout')

@section('title', 'My Modules')

@section('content')
    @if(!$object->modules->isEmpty())
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><b>My Modules at {{ $object->name }} Object</b></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <a href="{{ route('modules.create', ['object_id' => $object->id]) }}"
                                   style="float: right;" class="btn btn-success">Create New</a>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">

                            @if(session()->get('success'))
                                <div class="alert alert-success mt-3">
                                    {{ session()->get('success') }}
                                </div>
                            @endif

                            <table class="table table-my">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Current status</th>
                                    <th scope="col" class="table-buttons">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($object->modules as $module)
                                    <tr>
                                        <td>{{ $module->name }}</td>
                                        <td>{{ $module->type->name }}</td>
                                        <td>{{ $module->getCurrentParams->value }} {{ $module->type->unit }}</td>

                                        <td class="table-buttons">
                                            <a href="{{ route('modules.show', $module->id) }}"
                                               class="btn btn-primary" title="Show Module">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <form method="POST" action="{{ route('modules.destroy', $module->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                        title="Delete Module" onclick="return confirm('Are you sure?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    @else
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-8 text-red">
                            <h1>Your list of modules is empty. Please click Create New to add an item.</h1>
                        </div>
                        <div class="col-sm-2">
                            <ol class="breadcrumb float-sm-right">
                                <a href="{{ route('objects.index') }}"
                                   class="btn btn-success">Cancel</a>
                            </ol>
                        </div>
                        <div class="col-sm-2">
                            <ol class="breadcrumb float-sm-left">
                                <a href="{{ route('modules.create', ['object_id' => $object->id]) }}"
                                   style="float: right;" class="btn btn-danger">Add
                                    New Module</a>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endif

@endsection
