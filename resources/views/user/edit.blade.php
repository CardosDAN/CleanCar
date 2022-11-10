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
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User Settings /</span> Account</h4>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <h5 class="card-header">Profile Details</h5>
                                <!-- Account -->
                                <form id="formAccountSettings" method="POST" action="{{ route('user.update', $user) }}"
                                      enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
{{--                                            <img--}}
{{--                                                src="{{asset('images'). '/' .'users'. '/'. Auth::user()->image_path}}"--}}
{{--                                                alt="user-avatar"--}}
{{--                                                class="d-block rounded"--}}
{{--                                                height="100"--}}
{{--                                                width="100"--}}
{{--                                                id="uploadedAvatar"--}}
{{--                                            />--}}
                                            <div class="button-wrapper">
                                                <label><h4>{{__('Add image')}}</h4></label>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="image">

                                                            <input type="file" class="form-control" name="image"
                                                                   multiple>
                                                        </div>
                                                    </div>
                                                </div>
{{--                                                <button type="button"--}}
{{--                                                        class="btn btn-outline-secondary account-image-reset mb-4">--}}
{{--                                                    <i class="bx bx-reset d-block d-sm-none"></i>--}}
{{--                                                    <span class="d-none d-sm-block">Reset</span>--}}
{{--                                                </button>--}}

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
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="country">{{__('Level')}}</label>
                                                <select id="country" name="level_id" class="select2 form-select">
                                                    @foreach($levels as $level)
                                                        <option value="{{$level->id}}">{{$level->level_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /Account -->
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

                    </div>
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
