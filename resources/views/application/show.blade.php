<!DOCTYPE html>

<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free"
>
@include('layout.head')
<style type="text/css">
    .layout-menu-fixed .layout-navbar-full .layout-menu,
    .layout-page {
        padding-top: 0px !important;
    }

    .content-wrapper {
        padding-bottom: 0px !important;
    }
</style>
<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->

        @include('layout.menu')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            @include('layout.navbar')

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">

                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">


                    <h4 class="fw-bold py-3 mb-4">
                        <span class="text-muted fw-light">{{__("Application / View /")}}</span> {{__("User")}}
                    </h4>
                    <div class="row">
                        <!-- User Sidebar -->
                        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                            <!-- User Card -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="user-avatar-section">
                                        <div class=" d-flex align-items-center flex-column">
                                            <img class="img-fluid rounded my-4"
                                                 src="{{asset('images'). '/' . 'users' . '/' . $application->user->image_path}}"
                                                 height="110" width="110" alt="User avatar">
                                            <div class="user-info text-center">
                                                <h4 class="mb-2">{{$application->user->name}}</h4>
                                                <span class="badge bg-label-secondary">
                                                        @if($application->user->level_id === 1)
                                                        User
                                                    @elseif($application->user->level_id === 2)
                                                        Manager
                                                    @elseif($application->user->level_id === 3)
                                                        Worker
                                                    @elseif($application->user->level_id === 4)
                                                        Admin
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-around flex-wrap my-4 py-3">
                                        <div class="d-flex align-items-start me-4 mt-3 gap-3">
                                            <span class="badge bg-label-primary p-2 rounded"><i
                                                    class="bx bx-check bx-sm"></i></span>
                                            <div>
                                                <h5 class="mb-0">1.23k</h5>
                                                <span>Tasks Done</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start mt-3 gap-3">
                                            <span class="badge bg-label-primary p-2 rounded"><i
                                                    class="bx bx-customize bx-sm"></i></span>
                                            <div>
                                                <h5 class="mb-0">568</h5>
                                                <span>Projects Done</span>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="pb-2 border-bottom mb-4">{{__("Details")}}</h5>
                                    <div class="info-container">
                                        <ul class="list-unstyled">
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">{{__("Username:")}}</span>
                                                <span>{{$application->user->name}}</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">{{__("Email:")}}</span>
                                                <span>{{$application->user->email}}</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">Status:</span>
                                                <span class="badge bg-label-success">
                                                     @if(Cache::has('is_online' . $application->user->id))
                                                        <span class="text-success">Online</span>
                                                    @else
                                                        <span class="text-secondary">Offline</span>
                                                    @endif
                                                </span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">Last seen:</span>
                                                <span class="badge bg-label-secondary">
                                                     @if($application->user->last_seen != null)
                                                        {{ \Carbon\Carbon::parse($application->user->last_seen)->diffForHumans() }}
                                                    @else
                                                        No data
                                                    @endif
                                                </span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">{{__("Role:")}}</span>
                                                <span>
                                                     @if($application->user->level_id === 1)
                                                        User
                                                    @elseif($application->user->level_id === 2)
                                                        Manager
                                                    @elseif($application->user->level_id === 3)
                                                        Worker
                                                    @elseif($application->user->level_id === 4)
                                                        Admin
                                                    @endif
                                                </span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">{{__("id:")}}</span>
                                                <span>{{$application->user->id}}</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">Languages:</span>
                                                <span>French</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /User Card -->
                        </div>
                        <!--/ User Sidebar -->
                        <!-- User Content -->
                        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                            <!-- Activity Timeline -->
                            <div class="card mb-4">
                                <h5 class="card-header">Profile Details</h5>
                                <!-- Account -->
                                <form id="formAccountSettings" method="POST" action="{{ route('application.update', $application) }}"
                                      enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <hr class="my-0"/>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <p>
                                                    <span class="fw-bold me-2">{{__("Message:")}}</span>
                                                    <span>{{$application->message}}</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-primary me-2">Approve</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /Activity Timeline -->

                        </div>

                    </div>
                    <!-- / Content -->


                    <!-- Footer -->
                    @include('layout.footer')
                    <!-- / Footer -->


                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


@include('layout.script')
</body>
</html>
