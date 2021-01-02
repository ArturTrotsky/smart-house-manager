@extends('layouts.layout')

@section('title', 'Object list')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-0">
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <a href="{{route('objects.create')}}" class="btn btn-success">Create New</a>
                            </div>

                            @if(session()->get('success'))
                                <div class="alert alert-success mt-3">
                                    {{session()->get('success')}}
                                </div>
                            @endif

                            <table class="table table-striped mt-3">
                                <thead>
                                <tr>
                                    <th scope="col">{{'ID'}}</th>
                                    <th scope="col">{{'Name'}}</th>
                                    <th scope="col">{{'Action'}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($objects as $object)
                                    <tr>
                                        <td>{{$object->id}}</td>
                                        <td>{{$object->name}}</td>
                                        <td class="table-buttons">
                                            <a href="{{route('objects.show', $object->id)}}" class="btn btn-success">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{route('objects.edit', $object->id)}}" class="btn btn-primary">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form method="POST" action="{{route('objects.destroy', $object->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure?')">
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
            </div>
        </section>

    </div>

@endsection
