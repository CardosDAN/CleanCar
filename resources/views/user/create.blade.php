<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
      data-assets-path="../assets/" data-template="vertical-menu-template-free">
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
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add user /</span> User</h4>

                    <div class="row">
                        <div class="col-md-12">
                            <form id="formAccountSettings" action="{{ route('user.store') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card mb-4">
                                    <h5 class="card-header">User Details</h5>
                                    <!-- Account -->

                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <label><h4>{{__('Add image')}}</h4></label>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="image">

                                                        <input type="file" class="form-control" name="images[]"
                                                               multiple>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <hr class="my-0"/>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="firstName" class="form-label">{{__('Name')}}</label>
                                                <input class="form-control @error('name') is-invalid @enderror"
                                                       type="text" id="firstName"
                                                       name="name" autofocus/>
                                            </div>
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="mb-3 col-md-6">
                                                <label for="email" class="form-label">{{__('Email')}}</label>
                                                <input class="form-control @error('email') is-invalid @enderror"
                                                       type="email" id="email"
                                                       name="email"
                                                />
                                                @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="email" class="form-label">{{__('Password')}}</label>
                                                <input class="form-control @error('password') is-invalid @enderror"
                                                       type="password" id="email"
                                                       name="password"
                                                />
                                                @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="password_confirmation"
                                                       class="form-label">{{__('Confirm Password')}}</label>
                                                <input class="form-control " type="password" id="password_confirmation"
                                                       name="password_confirmation"
                                                />

                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="country">{{__('Levels')}}</label>
                                                <select id="country" class="select2 form-select" name="level_id">
                                                    @foreach ($levels as $level )
                                                        <option
                                                            value="{{ $level->id }}">{{ $level->level_name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-primary me-2">Save
                                                changes
                                            </button>
                                            <button type="reset"
                                                    class="btn btn-outline-secondary">Cancel
                                            </button>
                                        </div>

                                    </div>
                                    <!-- /Account -->
                                </div>
                            </form>

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


<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
@include('layout.script')
</body>

</html>
