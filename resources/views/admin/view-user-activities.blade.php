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
                        <li class="breadcrumb-item"><a href="#!">User </a></li>
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
                        <h5>User Activities</h5>

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
                                    <table class="table table-striped table-bordered table-sm">
                                        <thead>
                                            <tr>
                                                <th>Action  </th>
                                                <th>Action Type</th>
                                                <th>Date Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($userActivities as $action)
                                                <tr>
                                                    <td>{{$action->actionName}} </td>
                                                    <td>{{$action->workingDomain}} </td>
                                                    <td>{{$action->createdAt}} </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-4">
                                    <h5>User Info Update</h5>
                                    <hr/>


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
