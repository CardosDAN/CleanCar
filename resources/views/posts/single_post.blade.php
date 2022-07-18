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
                <!-- / Content -->
                <div class="container m-4">
                    <div class=" me-5 float-end">
                        <i class="bi bi-check2-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="blue" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                            </svg>
                        </i>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4 mb-3">
                            <div class="card h-100">
                                @foreach($post->images  as $image)
                                    <img class="card-img-top" src="/{{$image->url}}" alt="">
                                @endforeach
                            </div>
                        </div>
<!--                        --><?php
//                        $address = '2880 Broadway, New York';
//                        echo '<iframe frameborder="0" height="250" width="450"
//                                 src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+", $address)) . '&z=14&output=embed"></iframe>';
//                        ?>
                        <div class="col-lg-6">

                            <small class="text-light fw-semibold">Post information</small>
                            <div class="demo-inline-spacing mt-3">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bx bx-tv me-2" ></i>
                                        {{$post->title}}
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bx bx-desktop me-2"></i>
                                        {{$post->post_text}}
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bx bx-time me-2"></i>
{{--                                        {{$post->crated_at}}--}}
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

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
