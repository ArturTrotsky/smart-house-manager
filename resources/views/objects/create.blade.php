@extends('layouts.layout')

@section('pre-css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
@endsection

@section('title', 'Add object')

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

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{route('objects.store')}}">
                                @csrf

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Select object name</label>

                                        <select class="select2"
                                                data-dropdown-css-class="select2-purple" style="width: 100%;"
                                                name="name"
                                                type="text">
                                            <option disabled selected>Select a Object</option>
                                            <option>Bathroom</option>
                                            <option>Bedroom</option>
                                            <option>Boxroom</option>
                                            <option>Cellar</option>
                                            <option>Cloakroom</option>
                                            <option>Dining-room</option>
                                            <option>Games room</option>
                                            <option>Hall</option>
                                            <option>Kitchen</option>
                                            <option>Living-room</option>
                                            <option>Study room</option>
                                            <option>Toilet</option>
                                            <option>Utility room</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Bootstrap Switch -->
                                    <label>or enter your name</label>
                                    <input type="checkbox" name="my-checkbox" data-bootstrap-switch
                                           data-off-color="danger" data-on-color="success">
                                </div>

                                <div class="form-group">
                                    <input type="text" name="name" value="{{old('name')}}"
                                           placeholder="Enter a Object" class="form-control"
                                           id="object-name">
                                </div>

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-auto">
                                            <a href="{{route('objects.index')}}"
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

@section('post-script')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}" defer></script>
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}" defer></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}" defer></script>
    <!-- InputMask -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}" defer></script>
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}" defer></script>
    <!-- date-range-picker -->
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}" defer></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}" defer></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}" defer></script>
    <!-- Bootstrap Switch -->
    <script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" defer></script>
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
                $('.form-control').prop("disabled", true);
            });
        })
    </script>
@endsection
