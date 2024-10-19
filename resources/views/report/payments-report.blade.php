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
                        <li class="breadcrumb-item"><a href="#!">Payments Report</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->

    <!-- [ Main Content ] start -->
    <div class="row">


        <!-- seo start -->
        <div class="col-xl-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>{{$registrationCount}}</h3>
                            <h6 class="text-muted m-b-0">Registration<i class="fa fa-caret-down text-c-red m-l-10"></i></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>{{$paymentCount}}</h3>
                            <h6 class="text-muted m-b-0">Payments<i class="fa fa-caret-up text-c-green m-l-10"></i></h6>
                        </div>
                        <div class="col-6">
                            <div id="seo-chart2" class="d-flex align-items-end"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- seo end -->

        <!-- prject ,team member start -->
        <div class="col-xl-12 col-md-12">
            <div class="card table-card">
                <div class="card-header">
                    <h5>All Payments </h5>
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
                                            <th>Contact No</th>
                                            <th>Amount</th>
                                            <th>Payment Status</th>
                                            <th>Transaction ID</th>
                                            <th>Transaction Date</th>
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

    <script type="text/javascript">



        $(document).ready(function () {

            $('#visitortable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('/get-all-payments') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data: 'alumniContactNo', name: 'alumniContactNo', searchable: true},
                    {data: 'paymentAmount', name: 'paymentAmount', searchable: true},
                    {data: 'paymentStatus', name: 'paymentStatus', searchable: true},
                    {data: 'transactionId', name: 'transactionId', searchable: true},
                    {data: 'transactionDate', name: 'transactionDate', searchable: true},

                ]
            });
        });

    </script>
@endsection
