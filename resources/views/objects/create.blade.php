@extends('layouts.layout')

@section('pre-css')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <script>
        function handleClick(element) {
            if (element.checked) {
                $("#object-name-input").show();
                $("#div-select").hide();
            } else {
                $("#object-name-input").hide();
                $("#div-select").show();
            }
        }
    </script>
@endsection

@section('title', 'Add Object')

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
                                <h3 class="card-title">Create new Object</h3>
                            </div>
                            <form method="POST" action="{{route('objects.store')}}">
                                @csrf

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Select object name or enter your name</label>
                                            <!-- Bootstrap Switch -->
                                            <input type="checkbox" name="my-checkbox" onchange="handleClick(this)"
                                                   data-bootstrap-switch data-off-color="danger"
                                                   data-on-color="success">

                                        <div id="div-select">
                                            <select id="object-name-select" class="select2"
                                                    data-dropdown-css-class="select2-purple"
                                                    style="width: 100%;"
                                                    name="name" type="text">
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
                                    <input type="text" name="name" value="{{old('name')}}"
                                           placeholder="Enter a Object" class="form-control"
                                           id="object-name-input" style="display: none">
                                    </div>
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
            });
        })
    </script>
@endsection
