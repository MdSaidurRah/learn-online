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

                                        <h5>Committee Members</h5>

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

                                            <table class='table'>

                                                <tbody>

                                                    <tr>
                                                        <td> Committee Name</td>
                                                        <td>   {{$committeemembers[0]->committeeName}} </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Member Name</td>
                                                        <td>  {{$committeemembers[0]->memberPeopleName}}  </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Member Role</td>
                                                        <td>  {{$committeemembers[0]->memberRole}}  </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Member Order</td>
                                                        <td>  {{$committeemembers[0]->entityObjectOrder}}  </td>
                                                    </tr>

                                                    <tr>
                                                        <td> Member Status</td>
                                                        <td>  {{$committeemembers[0]->committeemembersStatus}}  </td>
                                                    </tr>

                                                    <tr>
                                                        <td>Created At</td>
                                                        <td>  {{$committeemembers[0]->createdAt}}  </td>
                                                    </tr>

                                                </tbody>

                                            </table>

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
