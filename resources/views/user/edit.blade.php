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
                        <span class="text-muted fw-light">{{__("User / View /")}}</span> {{__("Security")}}
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
                                            <a href="{{route('user.edit',$user)}}" class="btn btn-primary me-3"
                                               data-bs-target="#editUser">Edit</a>
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
                                <li class="nav-item"><a class="nav-link " href="{{route('user.show',\Illuminate\Support\Facades\Auth::user())}}"><i
                                            class="bx bx-user me-1"></i>Account</a></li>
                                <li class="nav-item"><a class="nav-link active" href="{{route('user.edit',\Illuminate\Support\Facades\Auth::user())}}"><i
                                            class="bx bx-lock-alt me-1 "></i>Security</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('user.connections', \Illuminate\Support\Facades\Auth::user())}}"><i
                                            class="bx bx-link-alt me-1"></i>Connections</a></li>
                            </ul>
                            <!--/ User Pills -->

                            <!-- Activity Timeline -->
                            <div class="card mb-4">
                                <h5 class="card-header">Profile Details</h5>
                                <!-- Account -->
                                <form id="formAccountSettings" method="POST" action="{{ route('user.update', $user) }}"
                                      enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <div class="button-wrapper">
                                                <label><h4>{{__('Add image')}}</h4></label>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="image">

                                                            <input type="file" class="form-control" name="image">
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-0"/>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="firstName" class="form-label">{{__('Name')}}</label>
                                                <input
                                                    class="form-control"
                                                    type="text"
                                                    id="firstName"
                                                    name="name"
                                                    value="{{$user->name}}"
                                                    autofocus
                                                />
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="email" class="form-label">{{__('E-mail')}}</label>
                                                <input
                                                    class="form-control"
                                                    type="email"
                                                    id="email"
                                                    name="email"
                                                    value="{{$user->email}}"
                                                    placeholder="john.doe@example.com"
                                                />
                                            </div>
                                            @if(\Illuminate\Support\Facades\Auth::user()->level_id == \App\Models\Levels::ADMIN)
                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label" for="country">{{__('Level')}}</label>
                                                    <select id="country" name="level_id" class="select2 form-select">
                                                        <option value="{{$user->level_id}}">{{$user->level->level_name}}</option>
                                                        @foreach($levels as $level)
                                                            <option value="{{$level->id}}">{{$level->level_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /Activity Timeline -->

                    </div>
                        <div class="col-xl-12 col-lg-7 col-md-7 order-0 order-md-1">
                            <div class="card">
                                <h5 class="card-header">{{__("Delete Account")}}</h5>
                                <div class="card-body">
                                    <div class="mb-3 col-12 mb-0">
                                        <div class="alert alert-warning">
                                            <h6 class="alert-heading fw-bold mb-1">{{__("Are you sure you want to delete your account?")}}</h6>
                                            <p class="mb-0">{{__("Once you delete your account, there is no going back. Please be certain.")}}</p>
                                        </div>
                                    </div>
                                    <form id="formAccountDeactivation" method="POST" action="{{route('user.destroy', $user)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger deactivate-account">{{__("Deactivate Account")}}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <!--/ Add New Credit Card Modal -->

                    <!-- /Modal -->

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
