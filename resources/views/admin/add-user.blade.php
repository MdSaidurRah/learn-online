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
                        <li class="breadcrumb-item"><a href="#!">Add User</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!--  Inner page template start -->
        <div class="col-xl-12 col-md-12">
            <div class="card table-card">
                <div class="card-header">
                    <h5>New User</h5>
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

                    <div class="input-form" style="padding: 30px">

                        <form id="new-user-form" action="{{url('/user/store-user')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" >

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="formGroupExampleInput">Official Name</label>
                                    <input type="text" name="officialName" id="officialName" class="form-control"  placeholder="Full official name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="formGroupExampleInput">Designation</label>
                                    <input type="text" name="designation" class="form-control"  id="designation" placeholder="Designation">
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="formGroupExampleInput">User Official Email</label>
                                    <input type="email" name="userEmail" class="form-control" id="" placeholder="Official email">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="formGroupExampleInput">Password</label>
                                    <input type="text" name="password" class="form-control" id="password" placeholder="***********">
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="formGroupExampleInput">Contact no</label>
                                    <input type="text" name="userContactNo" class="form-control"  id="" placeholder="Contact No">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="formGroupExampleInput">Department</label>
                                    <select name="department_id" id="department_id" class="form-control">
                                        <option value="">Select Department</option>
                                        @foreach($department as $item)
                                            <option value="{{$item->id}}">{{$item->adminUnitName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlTextarea1">User Role</label>
                                    <select name="userRole" id="userRole" class="form-control">
                                        <option value="">Select Role</option>
                                        @foreach($role as $item)
                                            <option value="{{$item->role}}">{{$item->role}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlTextarea1">User Status</label>
                                    <select name="userStatus" id="userStatus" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="ACTIVE">Active</option>
                                        <option value="INACTIVE">Inactive</option>
                                        <option value="DRAFT">Draft</option>
                                    </select>
                                </div>
                            </div>


                            <div>
                                <button type="submit" class="btn btn-primary">Save </button>
                                <button type = "reset" class="btn btn-outline-primary" name= "reset" value= "Reset">Reset</button>
                            </div>

                        </form>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>

@stop


@section('page-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

    <script type="text/javascript">

        $("#new-user-form").validate({
            rules: {
                officialName: {
                    required: true
                },
                designation: {
                    required: true
                },
                userEmail: {
                    required: true,
                    email:true
                },
                password: {
                    required: true,
                    maxlength:12,
                    minlength: 4
                },
                department_id: {
                    required: true
                },
                userRole: {
                    required: true
                },
                userStatus: {
                    required: true
                }
            },
            messages: {
                userEmail: {
                    required: "Please enter email",
                }

            },
        })

    </script>
@endsection









