@extends('layout')
@section('page-content')

    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#!">User View</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->

        <!-- [ Main Content ] start -->
        <div class="row">



            <div class="col-xl-12 col-md-12" >
                <div class="card table-card">
                    <div class="card-header">
                        <h5>User Profile</h5>

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
                                <div class="col-md-8">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>User Name</td>
                                                <td>{{$user[0]->officialName}} </td>
                                            </tr>
                                            <tr>
                                                <td>Official Email</td>
                                                <td>{{$user[0]->userEmail}} </td>
                                            </tr>
                                            <tr>
                                                <td>Contact No</td>
                                                <td>{{$user[0]->userContactNo}} </td>
                                            </tr>
                                            <tr>
                                                <td>User Role</td>
                                                <td>{{$user[0]->userRole}} </td>
                                            </tr>
                                            <tr>
                                                <td>User Type</td>
                                                <td>{{$user[0]->userType}} </td>
                                            </tr>
                                            <tr>
                                                <td>User Status</td>
                                                <td>{{$user[0]->userStatus}} </td>
                                            </tr>
                                            <tr>
                                                <td>User Created At</td>
                                                <td>{{$user[0]->created_at}} </td>
                                            </tr>
                                            <tr>
                                                <td>User Created By</td>
                                                <td>{{$user[0]->createdBy}} </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <h5>User Info Update</h5>
                                    <hr/>

                                    <form action="{{url('/user/update-user')}}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <input type="hidden" name="id" value="{{$user[0]->id}}">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">User Official Name</label>
                                            <input type="text" name="officialName" class="form-control" value="{{$user[0]->officialName}}" id="" placeholder="First Name">
                                        </div>

                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Contact no</label>
                                            <input type="text" name="userContactNo" class="form-control" value="{{$user[0]->userContactNo}}" id="" placeholder="Contact No">
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput">Password</label>
                                            <input type="text" name="password" class="form-control"  id="" placeholder="***********">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">User Role</label>
                                            <select name="userRole" class="form-control">
                                                <option  value="{{$user[0]->userRole}}" >{{$user[0]->userRole}}</option>
                                                <option value="">Select Role</option>
                                                @foreach($role as $item)
                                                    <option value="{{$item->role}}">{{$item->role}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Department</label>
                                            <select name="department_id" class="form-control">
                                                <option value="{{$user[0]->department_id}}" >{{$user[0]->department}}</option>
                                                @foreach($department as $item)
                                                    <option value="{{$item->id}}">{{$item->adminUnitName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">User Status</label>
                                            <select name="userStatus" class="form-control">
                                                <option value="{{$user[0]->userStatus}}" >{{$user[0]->userStatus}}</option>
                                                <option value="">Select Status</option>
                                                <option value="ACTIVE">Active</option>
                                                <option value="INACTIVE">Inactive</option>
                                                <option value="DRAFT">Draft</option>
                                            </select>
                                        </div>

                                        <div>
                                            <button type="submit" class="btn btn-primary">Update </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>







                    </div>
                </div>
            </div>
            <!-- prject ,team member start -->
        </div>
        <!-- [ Main Content ] end -->
@stop

@section('page-script')

<script type="text/javascript">

    $(document).ready(function () {

        $('#usertable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('/get-all-user') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data: 'firstName', name: 'firstName', searchable: true},
                {data: 'userEmail', name: 'userEmail', searchable: true},
                {data: 'userContactNo', name: 'userContactNo', searchable: true},
                {data: 'userRole', name: 'userRole', searchable: true},
                {data: 'userStatus', name: 'userStatus', searchable: true},
                {data: 'action', name: 'action', searchable: true},
            ]
        });
    });

</script>
@endsection
