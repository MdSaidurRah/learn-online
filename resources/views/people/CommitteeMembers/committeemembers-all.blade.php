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

                                            <li class="breadcrumb-item"><a href="../../../../index.html"><i class="feather icon-home"></i></a></li>

                                            <li class="breadcrumb-item"><a href="#!">Committee Members</a></li>

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

                                                <h3>167</h3>

                                                <h6 class="text-muted m-b-0">Published<i class="fa fa-caret-down text-c-red m-l-10"></i></h6>

                                            </div>

                                            <div class="col-6">

                                                <div>

                                                    <a type="button" class="btn btn-success" href="{{url('/people/committeemembers/create')}}">

                                                        <i class="fa fa-plus-square" aria-hidden="true"></i> Create</a>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            <!-- seo end -->


                            <!-- prject ,team member start -->

                            <div class="col-xl-12 col-md-12">

                                <div class="card table-card" >

                                    <div class="card-header">

                                        <h5>CommitteeMembers</h5>

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

                                                <table class="table table-hover mb-0" id="objecttablename">

                                                    <thead>

                                                    <tr>

                                                        <th style="width: 5%;">SL</th>
                                                        <th style="width: 25%;">committeeName</th>
                                                        <th style="width: 20%;">Member Name</th>
                                                        <th style="width: 10%;">Member Role</th>
                                                        <th style="width: 10%;">Member Order</th>
                                                        <th style="width: 10%;">Member Status</th>
                                                        <th style="width: 20%;"></th>

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


                                    $('#objecttablename').DataTable({

                                        processing: true,

                                        serverSide: true,

                                        ajax: "{{ url('/people/committeemembers/get-all-items') }}",

                                        columns: [

                                            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                                            {data: 'committeeName', name: 'committeeName', searchable: true},
                                            {data: 'memberPeopleName', name: 'memberPeopleName', searchable: true},
                                            {data: 'memberRole', name: 'memberRole', searchable: true},
                                            {data: 'entityObjectOrder', name: 'entityObjectOrder', searchable: true},
                                            {data: 'committeemembersStatus', name: 'committeemembersStatus', searchable: true},
                                            {data: 'action', name: 'action', searchable: true},

                                        ]

                                    });

                                });


                            </script>

                            @stop

