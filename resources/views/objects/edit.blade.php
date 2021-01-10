@extends('layouts.layout')

@section('pre-css')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
@endsection

@section('title', 'Edit ' . $object->name)

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-0">
                </div>
            </div>
        </section>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Object</h3>
                            </div>
                            <form method="POST" action="{{route('objects.update', $object->id)}}">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="object-name" class="form-label">Name</label>
                                        <input type="text" name="name" value="{{$object->name}}" class="form-control"
                                               id="object-name">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-auto">
                                            <a href="{{ url()->previous() }}"
                                               class="btn btn-danger">Back</a>
                                        </div>
                                        <div class="col-md-auto">
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
