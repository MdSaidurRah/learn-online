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
                                            <li class="breadcrumb-item"><a href="../../../index.html"><i class="feather icon-home"></i></a></li>
                                            <li class="breadcrumb-item"><a href="#!">People</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">

                            <div class="col-xl-2 col-md-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-4">
                                                <h3>  {{$registeredPeople}}</h3>
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
                                            <div class="col-12">
                                                <p class="data-label"><i class="fas fa-user-edit"></i> | Faculty Member {{$facultyMember}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-2 col-md-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <p class="data-label"><i class="fas fa-user-cog"></i> | Admin Staff {{$adminStaff}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-2 col-md-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <p class="data-label"><i class="fas fa-user-shield"></i> | Key Person {{$keyPerson}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-2 col-md-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <p class="data-label"><i class="fas fa-user-graduate"></i> | Alumni {{$alumni}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-2 col-md-2">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <p class="data-label"><i class="fas fa-user-friends"></i> | Visitors {{$visitor}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-12 col-md-12">

                                <div class="card table-card" >

                                    <div class="card-header">

                                        <h5>People</h5>

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

                                    <div class="card-body p-0"  >

                                        <div class="table-responsive">

                                            <div class="" style="padding: 30px">

                                            <div class="row" >
                                                <div class="col-md-9"></div>
                                                <div class="col-md-3" style="text-align: right;margin: 20px 0px; ">
                                                    <input type="text" name="peopleCategory" id="peopleCategory" class="form-control" placeholder="People Cateogry">
                                                </div>
                                            </div>

                                                <table class="table-bordered table-striped table-sm" id="objecttablename">

                                                    <thead>
                                                    <tr>
                                                        <th style="width: 5%;">SL</th>
                                                        <th style="width: 5%;"></th>
                                                        <th style="width: 15%;">Name</th>
                                                        <th style="width: 10%;">Category</th>
                                                        <th style="width: 15%;">Designation</th>
                                                        <th style="width: 5%;">Order</th>
                                                        <th style="width: 5%;">Status</th>
                                                        <th style="width: 10%;">Office</th>
                                                        <th style="width: 10%;">Department</th>
                                                        <th style="width: 15%;"></th>

                                                    </tr>

                                                    </thead>


                                                </table>

                                            </div>

                                        </div>

                                    </div>

                                </div>


                                <!-- prject ,team member start -->


                            </div>


                        </div>

                            <!-- [ Main Content ] end -->


                            @stop



                            @section('page-script')


                            <script type="text/javascript">

                                $(document).ready(function () {


                                    var table = $('#objecttablename').DataTable({
                                        processing: true,
                                        serverSide: true,
                                        ajax: {
                                                url: "{{ url('/people/people/get-all-items') }}",
                                                data: function (d) {
                                                        d.peopleCategory = $('#peopleCategory').val(),
                                                        d.search = $('input[type="search"]').val()
                                                    }
                                                },
                                        columns: [
                                            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                                            {data: 'photograph', name: 'photograph', searchable: true},
                                            {data: 'fullName', name: 'fullName', searchable: true},
                                            {data: 'peopleCategory', name: 'peopleCategory', searchable: true},
                                            {data: 'designation', name: 'designation', searchable: true},
                                            {data: 'peopleOrder', name: 'peopleOrder', searchable: true},
                                            {data: 'peopleStatus', name: 'peopleStatus', searchable: true},
                                            {data: 'officeName', name: 'officeName', searchable: true},
                                            {data: 'departmentName', name: 'departmentName', searchable: true},
                                            {data: 'action', name: 'action', searchable: true},
                                        ]
                                    });

                                    $("#peopleCategory").keyup(function(){
                                        table.draw();
                                    });

                                });




                            </script>

                            @stop

