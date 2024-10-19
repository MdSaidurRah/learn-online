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
                        <li class="breadcrumb-item"><a href="#!">Edit User Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card table-card">
                <div class="card-header">
                    <h5>Edit Profile</h5>
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
                    <!-- Account page navigation-->
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header">Profile Picture</div>
                                <div class="card-body text-center">
                                    <img class="img-account-profile rounded-circle mb-2" id="photo-preview"  src="{{url(  $user[0]->userPhoto)}}" alt="">
                                    <div class="small font-italic text-muted mb-4">Permitted file format is JPG or PNG. Please upload image with width : 300px & height : 300px.</div>
                                    <form action="{{url('/userprofile/profile-photo-update')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="profileImage" id="profileImage"  />
                                        <br/> <br/>
                                        <input type="submit" name="submit"  value="Update Profile Photo"  class="form-control" />
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header">User Details</div>
                                <div class="card-body">
                                    {{$user}}
                                    <form>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputFirstName">First name</label>
                                                <input class="form-control"  id="firstName" value="{{$user[0]->firstName}}" name="firstName"  type="text" placeholder="Enter your first name">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLastName">Last name</label>
                                                <input class="form-control" id="lastName" name="lastName" value="{{$user[0]->lastName}}"  type="text" placeholder="Enter your last name">
                                            </div>
                                        </div>

                                        <div class="row gx-3 mb-3">

                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputOrgName">Designation</label>
                                                <input class="form-control" name="designation"  id="designation" value="{{$user[0]->designation}}"  type="text" placeholder="Designation" >
                                            </div>

                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLocation">Department</label>
                                                <input class="form-control" name="department" id="department" value="{{$user[0]->department}}"  type="text" placeholder="Department" >
                                            </div>
                                        </div>

                                        <div class="row gx-3 mb-3">


                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                                <input class="form-control" id="userEmail" name="userEmail" type="email" value="{{$user[0]->userEmail}}" placeholder="Email address">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputPhone">Contact number</label>
                                                <input class="form-control" id="userContactNo" name="userContactNo" value="{{$user[0]->userContactNo}}"  placeholder="Enter your phone number">
                                            </div>
                                        </div>

                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputJoining">Joining Date</label>
                                                <input class="form-control" type="date" name="joinDate"  id="joinDate" value="{{$user[0]->joinDate}}">
                                            </div>

                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputJoining"> Date of Birth</label>
                                                <input class="form-control" type="date" name="joinDate"  id="joinDate" value="{{$user[0]->joinDate}}">
                                            </div>


                                        </div>

                                        <div class="row gx-3 mb-3">

                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputPhone">User Status</label>
                                                <input class="form-control" id="userContactNo" name="userContactNo" value="{{$user[0]->userStatus}}"  placeholder="Enter your phone number">
                                            </div>

                                            <div class="col-md-6">
                                                <label class="small mb-1" for="admin">User Role</label>
                                                <input readonly class="form-control" value="{{$user[0]->userRole}}" id="admin" type="text">
                                            </div>
                                        </div>

                                        <button class="btn btn-primary" type="button">Save changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>

@stop

@section('page-script')
                <script type="text/javascript">

                    $('#profileImage').change(function () {
                        let file = $(this)[0].files[0];
                        if (file) {
                            reader = new FileReader();
                            reader.onload = function (event) {
                                let image = new Image();
                                image.src = reader.result;
                                image.onload = function () {
                                    let imgWidth = image.width;
                                    let imgHeight = image.height;
                                    if (imgWidth == 300 && imgHeight == 300) {
                                        $('#photo-preview').attr('src', event.target.result);
                                    } else {
                                        $('#photo').val('');
                                        $('#photo-preview').attr('src', '/images/dummyphoto.png');
                                        alert("File width and height is not in permitted size. Please upload image with width : 300px & height : 300px.");
                                    }
                                };
                            };
                            reader.readAsDataURL(file);
                        }
                    });


                </script>
@endsection
