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
    .btn-label-google-plus {
        color: #dd4b39;
        border-color: rgba(0,0,0,0);
        background: #fae2df;
    }
    .btn-label-github {
        color: purple;
        border-color: rgba(0,0,0,0);
        background: #e0e4ef;
    }
    .btn-label-facebook {
        color: #3b5998;
        border-color: rgba(0,0,0,0);
        background: #e6eaf5;
    }
    .btn-label-log{
        color: lightslategray;
        border-color: rgba(0,0,0,0);
        background: #e6eaf5;
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
                        <span class="text-muted fw-light">{{__("User / View /")}}</span> {{__("Account")}}
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
                                                 src="{{asset('images'). '/' . 'users' . '/' . $user->image_path}}"
                                                 height="110" width="110" alt="User avatar">
                                            <div class="user-info text-center">
                                                <h4 class="mb-2">{{$user->name}}</h4>
                                                <span class="badge bg-label-secondary">
                                                        @if($user->level_id === 1)
                                                        User
                                                    @elseif($user->level_id === 2)
                                                        Manager
                                                    @elseif($user->level_id === 3)
                                                        Worker
                                                    @elseif($user->level_id === 4)
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
                                                <h5 class="mb-0">{{$approved_posts}}</h5>
                                                <span>{{__("Posts")}}</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start mt-3 gap-3">
                                            <span class="badge bg-label-primary p-2 rounded"><i
                                                    class="bx bx-customize bx-sm"></i></span>
                                            <div>
                                                <h5 class="mb-0">{{$completed_offers}}</h5>
                                                <span>{{__("Completed Offers")}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="pb-2 border-bottom mb-4">{{__("Details")}}</h5>
                                    <div class="info-container">
                                        <ul class="list-unstyled">
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">{{__("Username:")}}</span>
                                                <span>{{$user->name}}</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">{{__("Email:")}}</span>
                                                <span>{{$user->email}}</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">Status:</span>
                                                <span class="badge bg-label-success">
                                                     @if(Cache::has('is_online' . $user->id))
                                                        <span class="text-success">Online</span>
                                                    @else
                                                        <span class="text-secondary">Offline</span>
                                                    @endif
                                                </span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">Last seen:</span>
                                                <span class="badge bg-label-secondary">
                                                     @if($user->last_seen != null)
                                                        {{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                                                    @else
                                                        No data
                                                    @endif
                                                </span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">{{__("Role:")}}</span>
                                                <span>
                                                     @if($user->level_id === 1)
                                                        User
                                                    @elseif($user->level_id === 2)
                                                        Manager
                                                    @elseif($user->level_id === 3)
                                                        Worker
                                                    @elseif($user->level_id === 4)
                                                        Admin
                                                    @endif
                                                </span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">{{__("id:")}}</span>
                                                <span>{{$user->id}}</span>
                                            </li>
                                        </ul>
                                        <div class="d-flex justify-content-center pt-3">
                                            <a href="{{route('user.edit',\Illuminate\Support\Facades\Auth::user())}}"
                                               class="btn btn-primary me-3">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /User Card -->
                        </div>
                        <!--/ User Sidebar -->
                        <!-- User Content -->
                        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                            <!-- User Pills -->
                            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                <li class="nav-item"><a class="nav-link "
                                                        href="{{route('user.show',\Illuminate\Support\Facades\Auth::user())}}"><i
                                            class="bx bx-user me-1"></i>{{__("Account")}}</a></li>
                                <li class="nav-item"><a class="nav-link"
                                                        href="{{route('user.edit',\Illuminate\Support\Facades\Auth::user())}}"><i
                                            class="bx bx-lock-alt me-1"></i>{{__("Security")}}</a></li>
                                <li class="nav-item"><a class="nav-link active"
                                                        href="{{route('user.connections', \Illuminate\Support\Facades\Auth::user())}}"><i
                                            class="bx bx-link-alt me-1"></i>Connections</a></li>
                            </ul>
                            <!--/ User Pills -->
                            <div class="card mb-4">
                                <div class="card">
                                    <h5 class="card-header">{{__("Connected Accounts")}}</h5>
                                    <div class="card-body">

                                        <p>{{__("Connect with other accounts")}}</p>
                                        <!-- Connections -->

                                        <div class="d-flex mb-3">
                                            <div class="flex-shrink-0">
                                                <img src="{{asset('../assets/img/icons/brands/google.png')}}"
                                                     alt="google" class="me-3" height="30">
                                            </div>
                                            <div class="flex-grow-1 row">
                                                <div class="col-9 mb-sm-0 mb-2">
                                                    <h6 class="mb-0">Google</h6>
                                                </div>
                                                <div class="col-3 text-end">
                                                    <div class="form-check form-switch">
                                                        @if(\Illuminate\Support\Facades\Auth::user()->google_id != null)
                                                            <a href="{{route('disconnect.google', \Illuminate\Support\Facades\Auth::user()->id)}}" class="btn btn-icon me-3 btn-label-log">
                                                                <i class="tf-icon bx bx-log-out"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{ url('auth/google') }}" class="btn btn-icon btn-label-google-plus me-3">
                                                                <i class="tf-icon bx bxl-google-plus"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex mb-3">
                                            <div class="flex-shrink-0">
                                                <img src="{{asset('../assets/img/icons/brands/github.png')}}"
                                                     alt="github" class="me-3" height="30">
                                            </div>
                                            <div class="flex-grow-1 row">
                                                <div class="col-9 mb-sm-0 mb-2">
                                                    <h6 class="mb-0">Github</h6>
                                                </div>
                                                <div class="col-3 text-end">
                                                    <div class="form-check form-switch">
                                                        @if(\Illuminate\Support\Facades\Auth::user()->github_id != null)
                                                            <a href="{{route('disconnect.github', \Illuminate\Support\Facades\Auth::user()->id)}}" class="btn btn-icon me-3 btn-label-log">
                                                                <i class="tf-icons bx bx-log-out"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{ url('auth/github') }}" class="btn btn-icon btn-label-github me-3">
                                                                <i class="tf-icons bx bxl-github"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex mb-3">
                                            <div class="flex-shrink-0">
                                                <img src="{{asset('../assets/img/icons/brands/facebook.png')}}"
                                                     alt="facebook" class="me-3" height="30">
                                            </div>
                                            <div class="flex-grow-1 row">
                                                <div class="col-9 mb-sm-0 mb-2">
                                                    <h6 class="mb-0">Facebook</h6>
                                                </div>
                                                <div class="col-3 text-end">
                                                    <div class="form-check form-switch">
                                                        @if(\Illuminate\Support\Facades\Auth::user()->facebook_id != null)
                                                            <a href="{{route('disconnect.facebook', \Illuminate\Support\Facades\Auth::user()->id)}}" class="btn btn-icon btn-label-log me-3">
                                                                <i class="tf-icon bx bx-log-out"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{ url('auth/facebook') }}" class="btn btn-icon btn-label-facebook me-3">
                                                                <i class="tf-icon bx bxl-facebook"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- /Connections -->

                                    </div>
                                </div>
                            </div>

                        </div>

                        <!--/ User Content -->
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
