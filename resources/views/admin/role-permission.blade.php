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
                        <li class="breadcrumb-item"><a href="#!">Role & Permission</a></li>
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
        <div class="col-xl-5 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                       
                        <div class="col-12">
                            <div>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rolePermissionModal">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i> Role Permission Assign</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                    
                        <div class="col-12">
                            <div>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#roleModal">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i> Role </button>
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
                    
                        <div class="col-12">
                            <div>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#permissionModal">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i> Permission </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
        <!-- seo end -->

        


        <div class="row">

            <div class="col-xl-5 col-md-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h5>All Roles and Permissions</h5>
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
                    <div class="card-body p-0" >
                        <div class="table-responsive" style="padding: 30px">
                            <table class="table table-hover mb-0" id="rolepermissiontable">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Role</th>
                                    <th>Permission</th>
                                    <th>Status</th>
                                    <th class="text-right"></th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- prject ,team member start -->

            <div class="col-xl-3 col-md-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h5>Roles</h5>
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
                    <div class="card-body p-0" >
                        <div class="table-responsive" style="padding: 30px">
                            <table class="table table-hover mb-0" id="rolestable">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th class="text-right"></th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-4 col-md-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h5>Permissions</h5>
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
                    <div class="card-body p-0" >
                        <div class="table-responsive" style="padding: 30px">
                            <table class="table table-hover mb-0" id="permissiontable">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Permission</th>
                                    <th>Status</th>
                                    <th class="text-right"></th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <!-- Role Permission Modal -->

        <div class="modal bd-example-modal-lg fade" id="rolePermissionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Role Permission Assign</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="rolePermissionForm" action="" method="">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Role</label>
                                <select name="userRole" id="userRole" class="form-control" required>
                                    <option value="">Select Role</option>
                                    @foreach($role as $item)
                                        <option value="{{$item->role}}">{{$item->role}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Permission:</label>
                                <select name="userPermission" id="userPermission" class="form-control" required>
                                    <option value="">Select Permission</option>
                                    @foreach($permission as $item)
                                        <option value="{{$item->permission}}">{{$item->permission}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Assign Permission" class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Role  Modal -->

        <div class="modal bd-example-modal-lg fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Role Create</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form  id="roleForm" action="" method="">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Role</label>
                                <input type="text" name="role" id="role" class="form-control" placeholder="Role name" required>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" value="Save Role" class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Permission  Modal -->

        <div class="modal bd-example-modal-lg fade" id="permissionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Permission Create</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="permissionForm" action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Permission</label>
                                <input type="text" name="permission" id="permission" class="form-control" placeholder="Permission name" required>
                            </div>

                            <div class="form-group">
                                <input type="submit" id="savePermission" name="submit" value="Save Permission" class="form-control ">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


    </div>


@stop

@section('page-script')

    <script type="text/javascript">

        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $("#rolePermissionForm").submit(function(e){
                e.preventDefault();
                var userRole = $("#userRole").val();
                var userPermission = $("#userPermission").val();


                $.ajax({
                    type:'GET',
                    url:"{{ url('/role-permission-assign') }}",
                    data:{
                        _token : $('meta[name="csrf-token"]').attr('content'),
                        userRole:userRole,
                        userPermission,userPermission,
                    },
                    success:function(data){
                        if($.isEmptyObject(data.fail)){
                            alert(data.success);
                            var rolepermissiontable = $('#rolepermissiontable').DataTable();
                            rolepermissiontable.ajax.reload();
                        }else{
                            alert("Matched Role and Permission has been Found.");
                        }
                    }
                });
            });


            $('body').on('click', '.deleteProduct', function () {
     
                var roleId = $(this).data("id");
                if(confirm("Are you sure want to delete this user !"))
                {
                        $.ajax({
                        type: "GET",
                        url: "{{ url('/role-permission-delete') }}"+'/'+roleId,
                        success: function (data) {
                            table.draw();
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }            
            });

            $("#roleForm").submit(function(e){
                e.preventDefault();
                var role = $("#role").val();

                $.ajax({
                    type:'GET',
                    url:"{{ url('/save-role') }}",
                    data:{
                        _token : $('meta[name="csrf-token"]').attr('content'),
                        role:role
                    },
                    success:function(data){
                        if($.isEmptyObject(data.fail)){
                            alert(data.success);
                            var roleTable = $('#rolestable').DataTable();
                            roleTable.ajax.reload();
                        }else{
                            alert("Role already exist or role add fail!");
                        }
                    }
                });
            });


            $("#permissionForm").submit(function(e){
                e.preventDefault();
                var permission = $("#permission").val();

                $.ajax({
                    type:'GET',
                    url:"{{ url('/save-permission') }}",
                    data:{
                        _token : $('meta[name="csrf-token"]').attr('content'),
                        permission:permission
                    },
                    success:function(data){
                        if($.isEmptyObject(data.fail)){
                            alert(data.success);
                            var permissiontable = $('#permissiontable').DataTable();
                            permissiontable.ajax.reload();
                        }else{
                            alert("Permission already exist or permission add fail!");
                        }
                    }
                });
            });



            var table = $('#rolepermissiontable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('/get-role-permission') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data: 'userRole', name: 'userRole', searchable: true},
                    {data: 'permission', name: 'permission', searchable: true},
                    {data: 'accessPermissionStatus', name: 'accessPermissionStatus', searchable: true},
                    {data: 'action', name: 'action', searchable: true},
                ]
            });

            $('#rolestable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('/get-role') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data: 'role', name: 'role', searchable: true},
                    {data: 'roleStatus', name: 'roleStatus', searchable: true},
                    {data: 'action', name: 'action', searchable: true},
                ]
            });

            $('#permissiontable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('/get-permission') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data: 'permission', name: 'permission', searchable: true},
                    {data: 'permissionStatus', name: 'permissionStatus', searchable: true},
                    {data: 'action', name: 'action', searchable: true},
                ]
            });
        });

    </script>
@endsection
