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

                                            <li class="breadcrumb-item"><a href="../../../../index.html"><i class="feather icon-home"></i></a></li>

                                            <li class="breadcrumb-item"><a href="#!">Committee Members</a></li>

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

                                        <h5>Edit CommitteeMembers</h5>

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

                                            <form action="{{url('/people/committeemembers/update')}}" method="POST" enctype="multipart/form-data">

                                                @csrf


                                                <input type='hidden' name='id' value='{{$committeemembers[0]->id}}'>


                                                <div class="row">

                                                    <div class="col-md-8">

                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label for="formGroupExampleInput">Committee </label>
                                                                <select class="form-control"name="committeeId" >
                                                                    <option value='{{$committeemembers[0]->committeeId}}'>{{$committeemembers[0]->committeeName}}</option>
                                                                    <option value="">Select committee</option>
                                                                    @foreach($committee as $item)
                                                                        <option value="{{$item->id}}">{{$item->adminUnitName}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label for="formGroupExampleInput"> Member </label>
                                                                <select class="form-control"name="memberPeopleId" >
                                                                    <option value='{{$committeemembers[0]->memberPeopleId}}'>{{$committeemembers[0]->memberPeopleName}}</option>
                                                                    <option value="">Select member</option>
                                                                    @foreach($people as $item)
                                                                        <option value="{{$item->id}}">{{$item->fullName}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label for="formGroupExampleInput"> Member Role</label>
                                                                <input type="text" class="form-control" name="memberRole" value='{{$committeemembers[0]->memberRole}}' id="memberRole" placeholder="Role">
                                                            </div>

                                                            <div class="form-group col-md-4">
                                                                <label for="formGroupExampleInput"> Member Order</label>
                                                                <input type="number" class="form-control" name="entityObjectOrder" value='{{$committeemembers[0]->entityObjectOrder}}' id="entityObjectOrder" placeholder="Order">
                                                            </div>
                                                        </div>


                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label for="formGroupExampleInput">Members Status</label>
                                                                <select class="form-control"name="committeemembersStatus" >
                                                                    <option value='{{$committeemembers[0]->committeemembersStatus}}'>{{$committeemembers[0]->committeemembersStatus}}</option>
                                                                    <option value="">Select Status</option>
                                                                    <option value="ACTIVE">Active</option>
                                                                    <option value="INACTIVE">Inactive</option>
                                                                    <option value="PUBLISHED">Published</option>
                                                                </select>
                                                            </div>

                                                        </div>


                                                        <div class="form-row">
                                                            <div class="col-md-12">
                                                                <input type="submit" name="submit" value="Update" class="btn btn-primary" />
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-4" style="padding-top:30px">

                                                        <div class="form-row">

                                                            <div class="col-md-12">

                                                            </div>

                                                        </div>

                                                        <div class="form-row">

                                                            <div class="col-md-12">

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
