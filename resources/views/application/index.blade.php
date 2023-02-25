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
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{__("Application /")}}</span> {{__("Applications Table")}}</h4>
                    <!-- Basic Bootstrap Table -->
                    <div class="card">

                        <h5 class="card-header">{{__("Application Table")}}</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>{{__("Message")}}</th>
                                    <th>{{__("User")}}</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                @foreach($applications as $application)
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                            <strong>{{$application->message}}</strong></td>
                                        <td>{{$application->user->name}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{route('application.edit',$application)}}"><i
                                                            class="bx bx-edit-alt me-1"></i> {{__("Edit")}}</a>
                                                    <a class="dropdown-item" href="{{route('application.show',$application)}}"><i
                                                            class="bx bx-show-alt me-1"></i> Show</a>
                                                    <form method="POST" action="{{route('application.destroy', $application)}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item" type="submit" onclick="return confirm('Are you sure?')"><i class="bx bx-trash me-1"></i> Delete</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                {{ $applications->links() }}
                            </table>

                        </div>
                    </div>
                    <!--/ Basic Bootstrap Table -->
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
