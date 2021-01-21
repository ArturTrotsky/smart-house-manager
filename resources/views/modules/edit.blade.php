@extends('layouts.layout')

@section('title', 'Edit ' . $module->name)

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-0">
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit {{ $module->getObject()->name }} Module</h3>
                            </div>
                            <form method="POST" action="{{ route('modules.update', $module->id) }}">
                                @csrf

                                <input type="hidden" name="module_id" value="{{ $module->id }}">

                                @method('PATCH')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="object-name" class="form-label">Name</label>
                                                <input type="text" name="name"
                                                       value="{{ old('name') ?? $module->name }}"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       id="object-name">

                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="object-name" class="form-label">Type</label>
                                                <select class="form-control select2 select2-danger

                                                        @error('module_type_id') is-invalid @enderror"

                                                        data-dropdown-css-class="select2-danger"
                                                        style="width: 100%;"
                                                        name="module_type_id"
                                                        type="text">
                                                    @foreach($moduleTypes as $type)
                                                        <option
                                                            @if($module->type->id == $type->id) selected @endif
                                                        value="{{ $type->id }}">{{ $type->name }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                @error('module_type_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="object-name" class="form-label">IP Address : Port</label>
                                                <input type="text" name="ip_adress"
                                                       value="{{ old('ip_adress') ?? $module->ip_adress }}"
                                                       class="form-control @error('ip_adress') is-invalid @enderror"
                                                       id="object-name">

                                                @error('ip_adress')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-auto">
                                            <a href="{{ route('objects.show', $module->object_id) }}"
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
            </div>
        </section>
    </div>
@endsection

@section('post-script')
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            $("input[data-bootstrap-switch]").each(function () {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
        })
    </script>
@endsection
