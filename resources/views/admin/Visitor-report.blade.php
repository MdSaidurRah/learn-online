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
                        <li class="breadcrumb-item"><a href="#!">Visitor Report Analytics</a></li>
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
                                <h3>$16,756</h3>
                                <h6 class="text-muted m-b-0">Published Reports<i class="fa fa-caret-down text-c-red m-l-10"></i></h6>
                            </div>
                            <div class="col-6">
                                <div>
                                        <button type="button" class="btn btn-success" href="#">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i> Visitor Report</button>
                                </div>
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
                                <h3>41.54%</h3>
                                <h6 class="text-muted m-b-0">=Reviews<i class="fa fa-caret-up text-c-green m-l-10"></i></h6>
                            </div>
                            <div class="col-6">
                                <div id="seo-chart2" class="d-flex align-items-end"></div>
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
                                <h3>12,564</h3>
                                <h6 class="text-muted m-b-0">All Visitor Reports<i class="fa fa-caret-down text-c-red m-l-10"></i></h6>
                            </div>
                            <div class="col-6">
                                <div id="seo-chart3" class="d-flex align-items-end"></div>
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
                        <h5>All Visitor Reports</h5>
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
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>
                                        <div class="chk-option">
                                            <label class="check-task custom-control custom-checkbox d-flex justify-content-center done-task">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </div>
                                        Assigned
                                    </th>
                                    <th>Name</th>
                                    <th>Due Date</th>
                                    <th class="text-right">Priority</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="chk-option">
                                            <label class="check-task custom-control custom-checkbox d-flex justify-content-center done-task">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </div>
                                        <div class="d-inline-block align-middle">
                                            <img src="{{url('assets/images/user/avatar-4.jpg')}}" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                            <div class="d-inline-block">
                                                <h6>John Deo</h6>
                                                <p class="text-muted m-b-0">Graphics Designer</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Able Pro</td>
                                    <td>Jun, 26</td>
                                    <td class="text-right"><label class="badge badge-light-danger">Low</label></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="chk-option">
                                            <label class="check-task custom-control custom-checkbox d-flex justify-content-center done-task">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </div>
                                        <div class="d-inline-block align-middle">
                                            <img src="{{url('assets/images/user/avatar-2.jpg')}}" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                            <div class="d-inline-block">
                                                <h6>Jenifer Vintage</h6>
                                                <p class="text-muted m-b-0">Web Designer</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Mashable</td>
                                    <td>March, 31</td>
                                    <td class="text-right"><label class="badge badge-light-primary">high</label></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="chk-option">
                                            <label class="check-task custom-control custom-checkbox d-flex justify-content-center done-task">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </div>
                                        <div class="d-inline-block align-middle">
                                            <img src="{{url('assets/images/user/avatar-3.jpg')}}" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                            <div class="d-inline-block">
                                                <h6>William Jem</h6>
                                                <p class="text-muted m-b-0">Developer</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Flatable</td>
                                    <td>Aug, 02</td>
                                    <td class="text-right"><label class="badge badge-light-success">medium</label></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="chk-option">
                                            <label class="check-task custom-control custom-checkbox d-flex justify-content-center done-task">
                                                <input type="checkbox" class="custom-control-input">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </div>
                                        <div class="d-inline-block align-middle">
                                            <img src="{{url('assets/images/user/avatar-2.jpg')}}" alt="user image" class="img-radius wid-40 align-top m-r-15">
                                            <div class="d-inline-block">
                                                <h6>David Jones</h6>
                                                <p class="text-muted m-b-0">Developer</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Guruable</td>
                                    <td>Sep, 22</td>
                                    <td class="text-right"><label class="badge badge-light-primary">high</label></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- prject ,team member start -->

        </div>
        <!-- [ Main Content ] end -->

@stop
