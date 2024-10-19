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
                        <li class="breadcrumb-item"><a href="#!">Admin & Staffs Analytics</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->

    <!-- [ Main Content ] start -->
    <div class="row">

        <div class="col-xl-2 col-md-2">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <h3>{{$registeredPeople}}</h3>
                        </div>
                        <div class="col-8" style="text-align: right">
                            <div>
                                <a type="button" class="btn btn-sm btn-success" href="{{url('/people/people/create')}}">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i> People</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-2 col-md-2">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <h3>{{$facultyMember}}</h3>
                        </div>
                        <div class="col-8" style="text-align: right">
                            <div>
                                <a type="button" class="btn btn-sm btn-success" href="{{url('/people/people-list/Faculty Member')}}"> Faculty Member</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-2 col-md-2">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <h3>{{$facultyMember}}</h3>
                        </div>
                        <div class="col-8" style="text-align: right">
                            <div>
                                <a type="button" class="btn btn-sm btn-success" href="{{url('/people/people-list/Committee Member')}}"> Committee Member</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-2 col-md-2">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <h3>{{$adminStaff}}</h3>
                        </div>
                        <div class="col-8" style="text-align: right">
                            <div>
                                <a type="button" class="btn btn-sm btn-success" href="{{url('/people/people-list/Admin Staff')}}"> Admin Staff</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-2 col-md-2">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <h3>{{$keyPerson}}</h3>
                        </div>
                        <div class="col-8" style="text-align: right">
                            <div>
                                <a type="button" class="btn btn-sm btn-success" href="{{url('/people/people-list/Key Person')}}"> Key Person</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-2 col-md-2">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <h3>{{$alumni}}</h3>
                        </div>
                        <div class="col-8" style="text-align: right">
                            <div>
                                <a type="button" class="btn btn-sm btn-success" href="{{url('/people/people-list/Alumni')}}"> Alumni</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-2 col-md-2">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-4">
                            <h3>{{$visitor}}</h3>

                        </div>
                        <div class="col-8" style="text-align: right">
                            <div>
                                <a type="button" class="btn btn-sm btn-success" href="{{url('/people/people-list/Visitor')}}"> Visitor</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- prject ,team member start -->
        <div class="col-xl-12 col-md-12">
            <div class="card table-card">
                <div class="card-header">
                    <h5>All {{$category}}</h5>
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
                                    <table class="table" id="adminstafftable">
                                        <input type="hidden" name="category" id="category" value="{{$category}}">
                                        <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th width="10%">Photo</th>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Office</th>
                                            <th>Order</th>
                                            <th>Status</th>
                                            <th></th>
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

            var $category =  document.getElementById("category").value;
            $('#adminstafftable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('/get-people/'.$category) }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data: 'photograph', name: 'photograph', searchable: true},
                    {data: 'fullName', name: 'fullName', searchable: true},
                    {data: 'designation', name: 'designation', searchable: true},
                    {data: 'workArea', name: 'workArea', searchable: true},
                    {data: 'peopleOrder', name: 'peopleOrder', searchable: true},
                    {data: 'peopleStatus', name: 'peopleStatus', searchable: true},
                    {data: 'action', name: 'action', searchable: true},
                ]
            });
        });

    </script>
@endsection
