@extends('layouts.layout')

@section('title', $object->name)

@section('content')

    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h3>{{$object->name}}</h3>
            </div>
        </div>
    </div>

@endsection
