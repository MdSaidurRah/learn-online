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
                        <li class="breadcrumb-item"><a href="#!">User Password Change</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card table-card">
                <div class="card-header">
                    <h5>Password Recovery</h5>
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
                <div class="container-xl px-4 mt-4">


                    <div class="mt-0 mb-4">Profile</br>
                        <div class="row">
                            <div class="col-xl-4">
                                <label class="small mb-1" for="inputFirstName">User Name</label>
                                <input readonly class="form-control" id="inputFirstName" type="text" value="Prof. Md. Saiful Azad">

                                <label class="small mb-1" for="inputRole">User Role</label>
                                <input readonly class="form-control" id="inputRole" type="text" value="ADMIN">

                            </div>
                            <div class="col-xl-8">
                                <div class="card mb-4">
                                    <div class="card-header">Password Details</div>
                                    <div class="card-body">
                                        <form action="{{url('/userprofile/password-update')}}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="small mb-1" for="admin">Current Password</label>
                                                <input class="form-control" required type="text" id="currentPassword" name="currentPassword" placeholder="********">
                                            </div>
                                            <div class="mb-3">
                                                <label class="small mb-1" for="admin">New Password</label>
                                                <input class="form-control"  required name="newPassword" id="newPassword" type="text" placeholder="New  password">
                                            </div>

                                            <div class="mb-3">
                                                <input type="submit" class="form-control" value="Change Password">
                                            </div>

                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>



@stop
