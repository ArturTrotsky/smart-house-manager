@extends('layouts.layout')

@section('pre-css')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/v4-shims.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-my.css') }}">
@endsection

@section('title', 'Object list')

@section('content')

    @if(!$object->modules->isEmpty())
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>List of {{$object->name}} modules</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <a href="{{route('modules.create')}}" style="float: right;" class="btn btn-success">Add
                                    Module</a>
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
                                    {{session()->get('success')}}
                                </div>
                            @endif

                            <table class="table table-my">
                                <thead>
                                <tr>
                                    <th scope="col">{{'ID'}}</th>
                                    <th scope="col">{{'Name'}}</th>
                                    <th scope="col">{{'Type'}}</th>
                                    <th scope="col">{{'IP Address'}}</th>
                                    <th scope="col" class="table-buttons">{{'Action'}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($object->modules as $module)
                                    <tr>
                                        <td>{{$module->id}}</td>
                                        <td>{{$module->name}}</td>
                                        <td>{{$module->type->name}}</td>
                                        <td>{{$module->ip_adress}}</td>

                                        <td class="table-buttons">
                                            <a href="{{route('modules.edit', $module->id)}}"
                                               class="btn btn-primary" title="Edit Module">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form method="POST" action="{{route('modules.destroy', $module->id)}}">
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
                        <div class="col-sm-10 text-red">
                            <h1>Your list of modules is empty. Please click Create New to add an item.</h1>
                        </div>
                        <div class="col-sm-2">
                            <ol class="breadcrumb float-sm-right">
                                <a href="{{route('modules.create')}}" style="float: right;" class="btn btn-danger">Add
                                    New Module</a>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endif

@endsection
