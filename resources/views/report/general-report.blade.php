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
                        <li class="breadcrumb-item"><a href="#!"> General Report Board</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->

    <!-- [ Main Content ] start -->
    <div class="row">


        <div class="col-xl-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row ">

                        <div class="col-md-4">
                            <h5> <i class="far fa-file-alt"></i> Website Visits Report</h5>
                            <hr/>
                            <a href="{{url('/report/visitor-report')}}" class="btn btn-sm btn-info">Visitor Report</a>
                            <hr/>


                            <h5> Date wise Report</h5>

                            <form action="{{url('/report/date-wise-visits')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="date"> Start Date</label>
                                                <input type="date" name="startDate" id="startDate" class="form-control"  >
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="date"> End Date</label>
                                                <input type="date" name="endDate" id="endDate" class="form-control"  >
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <input type="submit" name="submit" value="Show Report" class="btn btn-sm btn-primary" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>

                        <div class="col-md-4">
                            <h5> <i class="far fa-file-alt"></i> Visitor Report</h5>

                            <hr/>

                            <h5> Date wise Report</h5>

                            <form action="{{url('/report/date-wise-visitors')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="date"> Start Date</label>
                                                <input type="date" name="startDate" id="startDate" class="form-control"  >
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="date"> End Date</label>
                                                <input type="date" name="endDate" id="endDate" class="form-control"  >
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <input type="submit" name="submit" value="Show Report" class="btn btn-sm btn-primary" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>


{{--      =====================================================  --}}

        <div class="col-xl-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row ">

                        <div class="col-md-4 ">
                            <h5> <i class="far fa-file-alt"></i> General Content Publish </h5>
                            <hr/>

                            <form action="{{url('/report/general-content-publish')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="date"> Content Category</label>
                                                <select name="contentCategory" id="contentCategory" class="form-control" required>
                                                    <option value="">Category</option>
                                                    <option value="NEWS">News</option>
                                                    <option value="NOTICE">Notice</option>
                                                    <option value="UPCOMING-ACTIVITIES">Upcoming Activity</option>
                                                    <option value="RESEARCH-ACTIVITIES">Research Activity</option>
                                                    <option value="CAMPUS-ACTIVITIES">Campus Activities</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="date"> Start Date</label>
                                                <input type="date" name="startDate" id="startDate" class="form-control"  >
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="date"> End Date</label>
                                                <input type="date" name="endDate" id="endDate" class="form-control"  >
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <input type="submit" name="submit" value="Show Report" class="btn btn-sm btn-primary" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>


                        <div class="col-md-4">
                            <h5><i class="far fa-file-alt"></i> Departmental Content Publish </h5>
                            <hr/>
                            <form action="{{url('/report/departmental-content-publish')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="date"> Content Category</label>
                                                <select name="contentCategory" id="contentCategory" class="form-control" required >
                                                    <option value="">Category</option>
                                                    <option value="NEWS">News</option>
                                                    <option value="NOTICE">Notice</option>
                                                    <option value="UPCOMING-ACTIVITIES">Upcoming Activity</option>
                                                    <option value="RESEARCH-ACTIVITIES">Research Activity</option>
                                                    <option value="CAMPUS-ACTIVITIES">Campus Activities</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="date"> Department</label>
                                                <select name="department_id" class="form-control" required>
                                                    <option value="">Select Department</option>
                                                    @foreach( $department as $item)
                                                        <option value="{{$item->id}}">{{$item->adminUnitName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="date"> Start Date</label>
                                                <input type="date" name="startDate" id="startDate" class="form-control"  >
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="date"> End Date</label>
                                                <input type="date" name="endDate" id="endDate" class="form-control"  >
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <input type="submit" name="submit" value="Show Report" class="btn btn-sm btn-primary" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>

                        <div class="col-md-4">
                            <h5><i class="far fa-file-alt"></i> Individual Content Report </h5>


                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{--  ====================================== --}}

        <div class="col-xl-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row ">

                        <div class="col-md-4">
                            <h5> <i class="far fa-file-alt"></i> User Access Report</h5>
                            <hr/>

                            <h5> Date wise Report</h5>
                            <form action="{{url('/report/date-wise-visitors')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="date">User </label>
                                                <input type="text" name="startDate" id="startDate" class="form-control"  >
                                            </div>

                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="date"> Start Date</label>
                                                <input type="date" name="startDate" id="startDate" class="form-control"  >
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="date"> End Date</label>
                                                <input type="date" name="endDate" id="endDate" class="form-control"  >
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <input type="submit" name="submit" value="Show Report" class="btn btn-sm btn-primary" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{--  ====================================== --}}

        <div class="col-xl-12 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row ">

                        <div class="col-md-4">
                            <h5> <i class="far fa-file-alt"></i> Contact Us Message </h5>
                            <hr/>
                            <h5> Date wise Report</h5>
                            <form action="{{url('/report/date-wise-visitors')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="date"> Message Status</label>
                                                <select name="contentCategory" id="contentCategory" class="form-control" >
                                                    <option value="">Category</option>
                                                    <option value="NEWS">News</option>
                                                    <option value="NOTICE">Notice</option>
                                                    <option value="UPCOMING-ACTIIVTIES">Upcoming Activity</option>
                                                    <option value="RESEARCH-ACTIVITIES">Research Activity</option>
                                                    <option value="CAMPUS-ACTIVITIES">Campus Activities</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="date"> Start Date</label>
                                                <input type="date" name="startDate" id="startDate" class="form-control"  >
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="date"> End Date</label>
                                                <input type="date" name="endDate" id="endDate" class="form-control"  >
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <input type="submit" name="submit" value="Show Report" class="btn btn-sm btn-primary" />
                                            </div>
                                        </div>
                                    </div>
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
    <script type="text/javascript">



    </script>
@endsection
