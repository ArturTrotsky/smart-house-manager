@extends('layouts.layout')

@section('title', 'Edit ' . $object->name)

@section('content')

    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-0">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
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
                                        <a href="{{route('objects.index')}}"
                                           class="btn btn-danger">Back</a>
                                    </div>
                                    <div class="col-md-auto">
                                        <button type="submit" class="btn btn-success">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
