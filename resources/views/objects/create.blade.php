@extends('layouts.layout')

@section('pre-css')
    <script>
        function handleClick(element) {
            if (element.checked) {
                $("#object-name-input").show();
                $("#object-name-input").prop('disabled', false);
                $("#div-select").hide();
                $("#div-select").prop('disabled', true);
            } else {
                $("#object-name-input").hide();
                $("#object-name-input").prop('disabled', true);
                $("#div-select").show();
                $("#div-select").prop('disabled', false);
            }
        }
    </script>
@endsection

@section('title', 'Create Object')

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
                                <h3 class="card-title"><b>Create Object</b></h3>
                            </div>
                            <form method="POST" action="{{ route('objects.store') }}">
                                @csrf

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Select object name or enter your name</label>
                                        <!-- Bootstrap Switch -->
                                        <input type="checkbox" name="my-checkbox" onchange="handleClick(this)"
                                               data-bootstrap-switch data-off-color="danger"
                                               data-on-color="success">

                                        <div id="div-select">
                                            <select id="object-name-select"
                                                    class="select2 @error('name') is-invalid @enderror"
                                                    data-dropdown-css-class="select2-purple"
                                                    style="width: 100%;"
                                                    name="name" type="text">

                                                <option disabled selected>Select a Object name</option>
                                                @foreach($objects as $object)
                                                    <option
                                                        value="{{ $object->name }}">{{ $object->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>

                                        <input type="text" name="name" value="{{ old('name') }}"
                                               placeholder="Enter a Object"
                                               class="form-control @error('name') is-invalid @enderror"
                                               id="object-name-input" style="display: none">

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-auto">
                                            <a href="{{ route('objects.index') }}"
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

            $("input[data-bootstrap-switch]").each(function () {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
        })
    </script>
@endsection
