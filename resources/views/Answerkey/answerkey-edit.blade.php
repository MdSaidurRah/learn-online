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

                                            <li class="breadcrumb-item"><a href="#!">Answerkey</a></li> 

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

                                        <h5>Edit Answerkey</h5> 

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

                                            <form action="{{url('/answerkey/update')}}" method="POST" enctype="multipart/form-data"> 

                                                @csrf 


                                                <input type='hidden' name='id' value='{{$answerkey[0]->id}}'> 


                                                <div class="row"> 

                                                    <div class="col-md-8"> 

                                                        <div class="form-row"> 

                                                            <div class="form-group col-md-12"> 

                                                                <label for="formGroupExampleInput"> answerBody</label> 

                                                                <input type="text" class="form-control" name="answerBody" value='{{$answerkey[0]->answerBody}}' id="answerBody" placeholder="answerBody" > 

                                                            </div> 

                                                        </div> 


                                                        <div class="form-row"> 

                                                            <div class="form-group col-md-12"> 

                                                                <label for="formGroupExampleInput"> answerType</label> 

                                                                <input type="text" class="form-control" name="answerType" value='{{$answerkey[0]->answerType}}' id="answerType" placeholder="answerType" > 

                                                            </div> 

                                                        </div> 


                                                        <div class="form-row"> 

                                                            <div class="form-group col-md-4"> 

                                                                <label for="formGroupExampleInput">answerkeyStatus</label> 

                                                                <select class="form-control"name="answerkeyStatus" > 

                                                                    <option value='{{$answerkey[0]->answerkeyStatus}}'>{{$answerkey[0]->answerkeyStatus}}</option>   

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

                                                                <button type = "reset" class="btn btn-outline-primary" name= "reset" value= "Reset">Reset</button> 

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
