@extends('layouts.layout')

@section('title', 'Create Scheduler')

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
                                <h3 class="card-title"><b>Create scheduler for {{ $module->name }}</b></h3>
                            </div>
                            <form method="POST" action="{{ route('schedulers.store') }}">
                                @csrf

                                <input type="hidden" name="module_id" value="{{ $module->id }}">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="object-name" class="form-label">Module Type</label>
                                                <input type="text" name="module_name" value="{{ $module->type->name }}"
                                                       class="form-control" id="object-name" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="object-name" class="form-label">Value</label>
                                                <input type="text" name="value" value="{{ old('value') }}"
                                                       placeholder="Enter value"
                                                       class="form-control @error('value') is-invalid @enderror"
                                                       id="object-name">

                                                @error('value')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="object-name" class="form-label">Unit</label>
                                                <input type="text" name="unit" value="{{ $module->type->unit }}"
                                                       class="form-control" id="object-name" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="bootstrap-timepicker">
                                                <div class="form-group">
                                                    <label>Time ON</label>

                                                    <div class="input-group date" id="timepicker_on"
                                                         data-target-input="nearest">
                                                        <input type="text" name="on_time" value="{{ old('on_time') }}"
                                                               data-target="#timepicker_on"
                                                               placeholder="Enter the time of module activation"
                                                               class="form-control datetimepicker-input
                                                               @error('on_time') is-invalid @enderror">
                                                        <div class="input-group-append" data-target="#timepicker_on"
                                                             data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="far fa-clock"></i>
                                                            </div>
                                                        </div>

                                                        @error('on_time')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="bootstrap-timepicker">
                                                <div class="form-group">
                                                    <label>Time OFF</label>

                                                    <div class="input-group date" id="timepicker_off"
                                                         data-target-input="nearest">
                                                        <input type="text" name="off_time" value="{{ old('off_time') }}"
                                                               data-target="#timepicker_off"
                                                               placeholder="Enter the time the module deactivation"
                                                               class="form-control datetimepicker-input
                                                               @error('off_time') is-invalid @enderror"/>

                                                        <div class="input-group-append" data-target="#timepicker_off"
                                                             data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="far fa-clock"></i>
                                                            </div>
                                                        </div>

                                                        @error('off_time')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="object-name" class="form-label">Work period</label>
                                                <select class="form-control select2 select2-danger

                                                        @error('period') is-invalid @enderror"

                                                        data-dropdown-css-class="select2-danger"
                                                        style="width: 100%;"
                                                        name="period"
                                                        type="text">

                                                    <option disabled selected>Select a period</option>
                                                    <option value="every_day">Every day</option>
                                                    <option value="every_week">Every week</option>
                                                    <option value="every_hour">Every hour</option>
                                                    <option value="every_work_day">Every work day</option>
                                                    <option value="weekend">Every weekend</option>
                                                </select>

                                                @error('period')
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
                                               class="btn btn-danger">Cancel</a>
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

@section('post-script')
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Timepicker
            $('#timepicker_on').datetimepicker({
                format: 'HH:mm'
            })
            $('#timepicker_off').datetimepicker({
                format: 'HH:mm'
            })

            $("input[data-bootstrap-switch]").each(function () {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
        })
    </script>
@endsection
