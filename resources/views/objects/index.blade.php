@extends('layouts.layout')

@section('title', 'My Objects')

@section('content')

    @if(!$objects->isEmpty())
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><b>My Objects</b></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <a href="{{ route('objects.create') }}" style="float: right;" class="btn btn-success">Create Object</a>
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
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Module</th>
                                    <th scope="col" class="table-buttons">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($objects as $object)
                                    <tr>
                                        <td>{{ $object->id }}</td>
                                        <td>{{ $object->name }}</td>

                                        @if(!$object->modules->isEmpty())
                                            <td><a href="{{ route('objects.show', $object->id) }}"
                                                   class="btn btn-my btn-success">
                                                    <i class="fa fa-wifi"> Show My Modules</i>
                                                </a></td>
                                        @else
                                            <td><a href="{{ route('modules.create', $object->id) }}"
                                                   class="btn btn-my btn-danger">
                                                    <i class="fa fa-wifi"> Add Modules</i>
                                                </a></td>
                                        @endif

                                        <td class="table-buttons">
                                            <a href="{{ route('objects.edit', $object->id) }}"
                                               class="btn btn-primary" title="Edit Object">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form method="POST" action="{{ route('objects.destroy', $object->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                        title="Delete Object" onclick="return confirm('Are you sure?')">
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
                        <div class="col-sm-10 text-red">
                            <h1>Your list of objects is empty. Please click Create New to add an item.</h1>
                        </div>
                        <div class="col-sm-2">
                            <ol class="breadcrumb float-sm-right">
                                <a href="{{ route('objects.create') }}" style="float: right;" class="btn btn-danger">Create
                                    New Object</a>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endif

@endsection
