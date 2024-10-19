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
                        <li class="breadcrumb-item"><a href="#!">User Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">


        <div class="col-xl-12 col-md-12">
            <div class="card table-card">
                <div class="card-header">
                    <h5>Basic Info</h5>
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
                <div class="container emp-profile">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <img src="{{url('images/profile/Prof_Azad.png')}}" alt=""/>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="profile-head">
                                    <h5>
                                        Saidur Rahman   
                                    </h5>
                                    <h6>
                                        Professor EduInnTech Smart University
                                    </h6>

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <a href="{{url('/userprofile/edit-profile')}}" type="button" class="btn btn-outline-info">Edit Profile</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div> </div>
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content profile-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>admin123</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Saidur Rahman </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>123 456 7890</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Professor</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Gender</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Male</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Birth-Date</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>12/06/1988</p>
                                            </div>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- prject ,team member start -->

    </div>
    <!-- [ Main Content ] end -->

@stop
