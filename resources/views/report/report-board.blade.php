@extends('layout')
@section('page-content')

    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard </h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#!"> Report Board</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->

    <!-- [ Main Content ] start -->
    <div class="row">


        <div class="col-xl-9 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <figure class="highcharts-figure">
                                <div id="container"></div>
                            </figure>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-md-12 col-xl-12">
                                            <h3>{{$thisDayVisitors}}</h3>
                                            <h6 class="text-muted m-b-0">Today's Visitor<i class="fa fa-caret-down text-c-red m-l-10"></i></h6>
                                        </div>
                                        <div class="col-12 col-md-12 col-xl-12">
                                            <h3>{{$totalVisitor}}</h3>
                                            <h6 class="text-muted m-b-0">Total Visitors<i class="fa fa-caret-up text-c-green m-l-10"></i></h6>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <form action="{{url('/report/visitor-analysis')}}" method="POST" class="form-inline" >
                                            @csrf
                                            <span style="font-size:16px; padding-bottom:10px">Select Date or Leave it blank to load all data</span>
                                            <br/>
                                            <div class="col-12 col-md-12 col-xl-12" style="padding-bottom:20px">

                                                <div class="form-group">
                                                    <input type="date" class="form-control" id="reportDate" name="reportDate" placeholder="Password">
                                                </div>
                                            </div>
                                            <br/>
                                            <div class="col-12 col-md-12 col-xl-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary mb-2">Show Data</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- seo start -->



        <!-- seo end -->

        <!-- prject ,team member start -->
        <div class="col-xl-12 col-md-12">
            <div class="card table-card">
                <div class="card-header">
                    <h5>Recent 100 Visitors </h5>
                    <div class="card-header-right">
                        <div class="btn-group card-option">
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="feather icon-more-horizontal"></i>
                            </button>
                            <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0" style="padding: 30px">
                    <div style="padding: 30px">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="visitortable">
                                        <thead>
                                        <tr>

                                            <th>Sl</th>
                                            <th>Visitor IP</th>
                                            <th>Time</th>
                                            <th>Date </th>
                                            <th>Page/Resource</th>
                                            <th>Path</th>
                                            <th>Method</th>
                                        </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>


@stop
@section('page-script')


    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script type="text/javascript">



        let visitDate = <?php echo json_encode($visitDate); ?>;
        let visitCount = <?php echo json_encode($visitCount); ?>;

        Highcharts.chart('container', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Daily Website Visit Report'
            },
            xAxis: {
                categories: visitDate
            },
            yAxis: {
                title: {
                    text: 'Daily Visit No.'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: 'Report Date',
                data: visitCount,
                dataLabels: [{
                    enabled: true,
                    inside: true,
                    style: {
                        fontSize: '16px'
                    }
                }]
            }]
        });



        $(document).ready(function () {

            $('#visitortable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('/get-all-visitors') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data: 'visitorIp', name: 'visitorIp', searchable: true},
                    {data: 'hitTime', name: 'hitTime', searchable: true},
                    {data: 'hitDate', name: 'hitDate', searchable: true},
                    {data: 'shortPage', name: 'shortPage', searchable: true},
                    {data: 'shortHitPath', name: 'shortHitPath', searchable: true},
                    {data: 'hitMethod', name: 'hitMethod', searchable: true},

                ]
            });
        });

    </script>
@endsection
