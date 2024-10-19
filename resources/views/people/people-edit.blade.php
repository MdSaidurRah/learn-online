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

                        <li class="breadcrumb-item"><a href="../../../index.html"><i class="feather icon-home"></i></a></li>

                        <li class="breadcrumb-item"><a href="#!">People</a></li>

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

                    <h5>Edit People</h5>

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

                        <form id="people-edit" action="{{url('/people/people/update')}}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <input type="hidden" name="id" value="{{$people[0]->id}}" >

                            <div class="row">
                                <div class="col-xl-4">

                                    <div class="card mb-4 mb-xl-0">
                                        <div class="card-header">Profile Photo</div>
                                        <div class="card-body text-center">
                                            @if(isset($people[0]->photo))
                                                <img class="img-account-profile rounded-circle mb-2" id="photo-preview"  src="{{$siteUrl.$people[0]->photo}}" alt="">
                                            @else
                                                <img class="img-account-profile rounded-circle mb-2" id="photo-preview"  src="{{url('images/profile/blank-profile.jpg')}}" alt="">
                                            @endif

                                            <div class="small font-italic text-muted mb-4">Permitted file format is JPG or PNG. Please upload image with width : 300px & height : 300px.</div>
                                            <input type="file" name="peoplePhoto" id="peoplePhoto"  />

                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-8">
                                    <!-- Account details card-->
                                    <div class="card mb-4">
                                        <div class="card-header"> Person Information Details</div>

                                        <div class="card-body">



                                            <div class="form-row">
                                                <div class="form-group col-md-8">
                                                    <label for="formGroupExampleInput"> Name</label>
                                                    <input type="text" name="fullName" value="{{$people[0]->fullName}}" class="form-control" id="" placeholder="Enter Name">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="formGroupExampleInput">People Category</label>
                                                    <select name="peopleCategory" id="peopleCategory" class="form-control">
                                                        <option value="{{$people[0]->peopleCategory}}">{{$people[0]->peopleCategory}}</option>
                                                        <option value="">Select Category</option>
                                                        <option value="Faculty Member">Faculty Member</option>
                                                        <option value="Admin Staff">Admin Staff</option>
                                                        <option value="Committee Member">Committee Member</option>
                                                        <option value="Visitor">Visitor</option>
                                                        <option value="Alumni">Alumni</option>
                                                        <option value="Key Person">Key Person</option>
                                                        <option value="System User">System User</option>
                                                    </select>
                                                </div>
                                            </div>



                                            @if($people[0]->peopleCategory  == 'Faculty Member')
                                                <div class="form-row" style="    background: #d9e4f7; padding: 10px; margin: 1px 0px 10px;">
                                                    <div class="form-group col-md-6">
                                                        <label for="formGroupExampleInput">Department</label>
                                                        <select id="department_id" name="department_id" class="form-control">
                                                            <option value="">Select Department</option>
                                                            @foreach($department as $item)
                                                                <option value="{{$item->id}}">{{$item->adminUnitName}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @elseif($people[0]->peopleCategory  == 'Admin Staff')
                                                <div class="form-row" style="    background: #d9e4f7; padding: 10px; margin: 1px 0px 10px;">
                                                    <div class="form-group col-md-6">
                                                        <label for="formGroupExampleInput">Office</label>
                                                        <select id="office_id" name="office_id" class="form-control">
                                                            <option value="">{{$people[0]->officeName}}</option>
                                                            <option value="">Select Office</option>
                                                            @foreach($office as $item)
                                                                <option value="{{$item->id}}">{{$item->adminUnitName}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="formGroupExampleInput">Designation</label>
                                                        <input type="text" name="designation" value="{{$people[0]->designation}}" id="designation" class="form-control" placeholder="Working Designation">
                                                    </div>
                                                </div>
                                            @elseif($people[0]->peopleCategory  == 'Committee Member')
                                                <div class="form-row" style="    background: #d9e4f7; padding: 10px; margin: 1px 0px 10px;">
                                                    <div class="form-group col-md-6">
                                                        <label for="formGroupExampleInput">Committee</label>
                                                        <select id="committee_id" name="committee_id" class="form-control">
                                                            <option value="">{{$people[0]->committeeName}}</option>
                                                            <option value="">Select Committee</option>
                                                            @foreach($committee as $item)
                                                                <option value="{{$item->id}}">{{$item->adminUnitName}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="formGroupExampleInput">Position</label>
                                                        <input type="text" value="{{$people[0]->position}}" id="position" name="position" class="form-control">
                                                    </div>
                                                </div>
                                            @elseif($people[0]->peopleCategory  == 'Alumni')
                                                <div class="form-row" style="    background: #d9e4f7; padding: 10px; margin: 1px 0px 10px;">
                                                    <div class="form-group col-md-6">
                                                        <label for="formGroupExampleInput">Department</label>
                                                        <select id="department_id" name="department_id" class="form-control">
                                                            <option value="{{$people[0]->department_id}}">{{$people[0]->departmentName}}</option>
                                                            <option value="">Select Department</option>
                                                            @foreach($department as $item)
                                                                <option value="{{$item->id}}">{{$item->adminUnitName}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="formGroupExampleInput">Passing Year</label>
                                                        <input type="number" name="passingYear" value="{{$people[0]->passingYear}}" id="passingYear" class="form-control" placeholder="Passing Year">
                                                    </div>
                                                </div>

                                                <div class="form-row" style="    background: #d9e4f7; padding: 10px; margin: 1px 0px 10px;">
                                                    <div class="form-group col-md-6">
                                                        <label for="formGroupExampleInput">Institute Name</label>
                                                        <input type="text" name="institutionName" value="{{$people[0]->institutionName}}" id="institutionName" class="form-control" placeholder="Working Institute Name">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="formGroupExampleInput">Designation</label>
                                                        <input type="text" name="designation" value="{{$people[0]->designation}}" id="designation" class="form-control" placeholder="Working Designation">
                                                    </div>
                                                </div>
                                            @elseif($people[0]->peopleCategory  == 'Visitor')
                                                <div class="form-row" style="    background: #d9e4f7; padding: 10px; margin: 1px 0px 10px;">
                                                    <div class="form-group col-md-6">
                                                        <label for="formGroupExampleInput">Institute Name</label>
                                                        <input type="text" name="institutionName" value="{{$people[0]->institutionName}}" id="institutionName" class="form-control" placeholder="Working Institute Name">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="formGroupExampleInput">Designation</label>
                                                        <input type="text" name="designation" value="{{$people[0]->designation}}" id="designation" class="form-control" placeholder="Working Designation">
                                                    </div>
                                                </div>
                                            @elseif($people[0]->peopleCategory  == 'Key Person')
                                                <div class="form-row" style="    background: #d9e4f7; padding: 10px; margin: 1px 0px 10px;">
                                                    <div class="form-group col-md-6">
                                                        <label for="formGroupExampleInput">Institute Name</label>
                                                        <input type="text" name="institutionName" value="{{$people[0]->institutionName}}" id="institutionName" class="form-control" placeholder="Working Institute Name">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="formGroupExampleInput">Designation</label>
                                                        <input type="text" name="designation" value="{{$people[0]->designation}}" id="designation" class="form-control" placeholder="Working Designation">
                                                    </div>
                                                </div>

                                            @endif




                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="formGroupExampleInput">Email</label>
                                                    <input type="text" name="email" value="{{$people[0]->email}}" class="form-control" id="" placeholder="Enter your Email">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="formGroupExampleInput">Contact no</label>
                                                    <input type="text" name="contactNo" value="{{$people[0]->contactNo}}" class="form-control"  id="" placeholder="Enter your Contact Number">
                                                </div>
                                            </div>


                                            <div class="form-row">


                                                <div class="form-group col-md-6">
                                                    <label for="formGroupExampleInput">Employment Type</label>
                                                    <select name="employmentType" class="form-control">
                                                        <option value="{{$people[0]->employmentType}}">{{$people[0]->employmentType}}</option>
                                                        <option value="">Select</option>
                                                        <option value="Permanent">Permanent</option>
                                                        <option value="Contractual">contractual</option>
                                                        <option value="Part-Time">Part-Time</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="formGroupExampleInput">Profile Link</label>
                                                    <input type="text" name="profileLink"  value="{{$people[0]->profileLink}}" class="form-control"  id="" placeholder="GUB website profile link">
                                                </div>
                                            </div>

                                            <div class="form-row">

                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="formGroupExampleInput">Order</label>
                                                    <input type="text" name="peopleOrder" value="{{$people[0]->peopleOrder}}" class="form-control"  id="" placeholder="Place order">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="exampleFormControlTextarea1">Status</label>
                                                    <select name="peopleStatus" class="form-control">
                                                        <option value="{{$people[0]->peopleStatus}}">{{$people[0]->peopleStatus}}</option>
                                                        <option value="">Select Status</option>
                                                        <option value="ACTIVE">ACTIVE</option>
                                                        <option value="INACTIVE">INACTIVE</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div>
                                                <button type="submit" class="btn btn-primary">Update Information </button>
                                                <button type = "reset" class="btn btn-outline-primary" name= "reset" value= "Reset">Reset</button>
                                            </div>

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

        $('#faculty_id').on('change', function () {
            var faculty_id = this.value;
            $("#department_id").html('');
            $.ajax({
                url: "{{url('/get-faculty-wise-dept')}}",
                type: "POST",
                data: {
                    faculty_id: faculty_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#department_id').html('<option value="">-- Select Department --</option>');
                    $.each(result, function (key, value) {
                        $("#department_id").append('<option value="' + value
                            .id + '">' + value.fullName + '</option>');
                    });
                }
            });
        });


        $('#peoplePhoto').change(function () {
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
                            $('#peoplePhoto').val('');
                            $('#photo-preview').attr('src', '/images/dummyphoto.png');
                            alert("File width and height is not in permitted size. Please upload image with width : 300px & height : 300px.");
                        }
                    };
                };
                reader.readAsDataURL(file);
            }
        });

        $("#people-edit").validate({
            rules: {
                firstName: {
                    required: true
                },
                peopleCategory: {
                    required: true
                },
                email: {
                    required: true
                },
                committee_id: {
                    required: true
                },
                designation: {
                    required: true
                },
                employementType: {
                    required: true
                },
                order: {
                    required: true
                }
            },
        })


    </script>

@endsection
