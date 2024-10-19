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
                </div>
            </div>
        </div>
    </div>

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- table card-1 start -->
            <div class="col-md-12 col-xl-4">

                <!-- widget primary card start -->


                <div class="card flat-card widget-primary-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="fa-regular fa-newspaper"></i>
                        </div>
                        <div class="col-sm-9">
                            <a style="color: #ffffff" href="{{url('/news/all-news')}}">
                          
                            <h6>News</h6>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card flat-card widget-primary-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="fa-regular fa-newspaper"></i>
                        </div>
                        <div class="col-sm-9">
                            <a style="color: #ffffff" href="{{url('/notice/all-notice')}}">
                          
                            <h6>Notice</h6>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="card flat-card widget-primary-card">
                    <div class="row-table">
                        <div class="col-sm-3 card-body">
                            <i class="fa-regular fa-newspaper"></i>
                        </div>
                        <div class="col-sm-9">
                            <a style="color: #ffffff" href="{{url('/documents/all-documents')}}">
                          
                            <h6>Documents</h6>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- widget primary card end -->
            </div>

            <!-- People  -->
            <div class="col-md-12 col-xl-8">
                <div class="card support-bar overflow-hidden">
                    <div class="card-body pb-0">
                        <h2 class="m-0"></h2>
                        <span class="text-c-blue">Peoples</span>
                        <p class="mb-3 mt-3">Faculty Member, Administrative Staff and Committee Members</p>
                    </div>
                    <div id="support-chart"></div>

                    <div class="card-footer bg-primary text-white">
                        <div class="row text-center">
                            <a style="color: #ffffff" href="{{url('/people/people-list/Faculty Member')}}">
                            <div class="col">
                                <h4 class="m-0 text-white"></h4>
                                <span> Faculty Member</span>
                            </div>
                            </a>

                            <a style="color: #ffffff" href="{{url('/people/people-list/Admin Staff')}}">
                            <div class="col">
                                <h4 class="m-0 text-white"></h4>
                                <span> Admin Staff</span>
                            </div>
                            </a>

                            <a style="color: #ffffff" href="{{url('/people/people-list/Committee Member')}}">
                            <div class="col">
                                <h4 class="m-0 text-white"></h4>
                                <span> Committee Members</span>
                            </div>
                            </a>

                            <a style="color: #ffffff" href="{{url('/people/people-list/Key Person')}}">
                            <div class="col">
                                <h4 class="m-0 text-white"></h4>
                                <span> Key Person</span>
                            </div>
                            </a>

                            <a style="color: #ffffff" href="{{url('/people/people-list/Visitor')}}">
                            <div class="col">
                                <h4 class="m-0 text-white"></h4>
                                <span> Visitor</span>
                            </div>
                            </a>

                            <a style="color: #ffffff" href="{{url('/people/people-list/Alumni')}}">
                            <div class="col">
                                <h4 class="m-0 text-white"></h4>
                                <span> Alumni</span>
                            </div>
                            </a>




                        </div>
                    </div>
                </div>
            </div>
            <!-- Widget primary-success card end -->



            <!-- prject ,team member start -->



            <!-- seo end -->
        </div>
        <!-- [ Main Content ] end -->

@stop
