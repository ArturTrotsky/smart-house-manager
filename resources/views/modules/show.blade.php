@extends('layouts.layout')

@section('pre-css')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
@endsection

@section('title', 'Show Module')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1><b>Information about the {{ $module->name }} Module</b></h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3>Module</h3>
                </div>
                <div class="col-md-12">
                    <div class="card card-primary">

                        @if(session()->get('success'))
                            <div class="alert alert-success mt-3">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        <table class="table table-my">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">IP Address</th>
                                <th scope="col">Current status</th>
                                <th scope="col" class="table-buttons">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td>{{ $module->id }}</td>
                                <td>{{ $module->name }}</td>
                                <td>{{ $module->type->name }}</td>
                                <td>{{ $module->ip_adress }}</td>
                                <td>{{ $module->getCurrentParams->value }} {{ $module->type->unit }}</td>

                                <td class="table-buttons">
                                    <a href="{{ route('modules.edit', $module->id) }}"
                                       class="btn btn-primary" title="Edit Module">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <h3>Current scheduler</h3>

                    @if(!isset($scheduler->id))
                        <div class="row">
                            <div class="col-md-10">
                                <h4>You do not have a scheduler for this module.
                                    Press the button to create a scheduler.</h4>
                            </div>
                            <div class="col-md-2">
                                <ol class="float-sm-right">
                                    <a href="{{ route('schedulers.create', $module->id) }}"
                                       style="float: right;" class="btn btn-danger">Create
                                        scheduler</a>
                                </ol>
                            </div>
                        </div>
                    @endif

                </div>
                <div class="col-md-12">
                    <div class="card card-primary">

                        @if(session()->get('success_scheduler'))
                            <div class="alert alert-success mt-3">
                                {{ session()->get('success_scheduler') }}
                            </div>
                        @endif

                        @if(isset($scheduler->id))

                            <table class="table table-my">
                                <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Module ID</th>
                                    <th scope="col">Value</th>
                                    <th scope="col">ON Time</th>
                                    <th scope="col">OFF Time</th>
                                    <th scope="col">Every day</th>
                                    <th scope="col">Every week</th>
                                    <th scope="col">Every work day</th>
                                    <th scope="col">Weekend</th>
                                    <th scope="col" class="table-buttons">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>{{ $scheduler->id }}</td>
                                    <td>{{ $scheduler->module_id }}</td>
                                    <td>{{ $scheduler->value }} {{ $module->type->unit }}</td>
                                    <td>{{ $scheduler->on_time }}</td>
                                    <td>{{ $scheduler->off_time }}</td>
                                    <td>{{ $scheduler->every_day }}</td>
                                    <td>{{ $scheduler->every_week }}</td>
                                    <td>{{ $scheduler->every_work_day }}</td>
                                    <td>{{ $scheduler->weekend }}</td>

                                    <td class="table-buttons">
                                        <a href="{{ route('schedulers.edit', $scheduler->id) }}"
                                           class="btn btn-primary" title="Edit scheduler">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form method="POST" action="{{ route('schedulers.destroy', $scheduler->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                    title="Delete scheduler" onclick="return confirm('Are you sure?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                                </tbody>
                            </table>

                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <h3>Module parameter change history</h3>
                    <form name="test" method="get" action="/">
                    <input type="text" name="datetimes" />
                        <input type="submit" value="Show">
                    </form>

                    <div id="moduleParamsChart"></div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-auto">
                    <a href="{{ route('objects.show', $module->object_id) }}"
                       class="btn btn-danger">Back</a>
                </div>
            </div>
        </section>

    </div>

@endsection

@section('post-script')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
        $(function() {
            $('input[name="datetimes"]').daterangepicker({
                timePicker: true,
                startDate: moment().startOf('day'),
                endDate: moment(),
                locale: {
                    format: 'M/DD hh:mm A'
                }
            });
        });
    </script>
    <script>
        new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'moduleParamsChart',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: <?php echo json_encode($dataForChart); ?>,
            // The name of the data record attribute that contains x-values.
            xkey: 'date',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Value'],
        });
    </script>
@endsection
