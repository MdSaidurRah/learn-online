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

                                        <h5>People</h5>

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

                                        <div class="row" style="padding: 40px;">
                                            <div class="col-md-3">
                                                @if(isset($people[0]->photo))
                                                    <img class="img-account-profile rounded-circle mb-2" id="photo-preview"  src="{{$siteUrl.$people[0]->photo}}" alt="" width="100%">
                                                @else
                                                    <img class="img-account-profile rounded-circle mb-2" id="photo-preview"  src="{{url('images/profile/blank-profile.jpg')}}" alt="" width="100%">
                                                @endif

                                            </div>
                                            <div class="col-md-9">
                                                <a type="button" class="btn btn-primary" href="{{url('/people/people/edit/'.Crypt::encryptString($people[0]->id))}}">
                                                    <i class="fa fa-plus-square" aria-hidden="true"></i> Edit People
                                                </a>

                                                @if($people[0]->peopleCategory=="Faculty Member" AND $userExist<1)
                                                    <a type="button" class="btn btn-primary" href="{{url('/people/people/add-as-user/'.Crypt::encryptString($people[0]->id))}}">
                                                        <i class="fa fa-plus-square" aria-hidden="true"></i>  Faculty Member User
                                                    </a>
                                                @endif
                                                <hr/>
                                                <table class='table'>
                                                    <tbody>
                                                    <tr>
                                                        <td> Full Name</td>
                                                        <td>   {{$people[0]->fullName}} </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Email</td>
                                                        <td>  {{$people[0]->email}}  </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Designation</td>
                                                        <td>  {{$people[0]->designation}}  </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Category</td>
                                                        <td>  {{$people[0]->peopleCategory}}  </td>
                                                    </tr>

                                                    @if($people[0]->peopleCategory=="Faculty Member")
                                                        <tr>
                                                            <td> Department</td>
                                                            <td>  {{$people[0]->departmentName}}  </td>
                                                        </tr>

                                                    @elseif($people[0]->peopleCategory=="Admin Staff")
                                                        <tr>
                                                            <td> Office</td>
                                                            <td>  {{$people[0]->officeName}}  </td>
                                                        </tr>

                                                    @elseif($people[0]->peopleCategory=="Committee Member")
                                                        <tr>
                                                            <td> Committee Name</td>
                                                            <td>  {{$people[0]->committeeName}}  </td>
                                                        </tr>
                                                        <tr>
                                                            <td> Committee Name</td>
                                                            <td>  {{$people[0]->position}}  </td>
                                                        </tr>

                                                    @endif




                                                    </tbody>

                                                </table>
                                            </div>

                                        </div>





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
