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
                    {{--                    <div class=" me-5 float-end">--}}
                    {{--                        <i class="bi bi-check2-circle">--}}
                    {{--                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="blue"--}}
                    {{--                                 class="bi bi-check2-circle" viewBox="0 0 16 16">--}}
                    {{--                                <path--}}
                    {{--                                    d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>--}}
                    {{--                                <path--}}
                    {{--                                    d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>--}}
                    {{--                            </svg>--}}
                    {{--                        </i>--}}
                    {{--                    </div>--}}
                    <div class="row ">
                        <div class="col-md-5  mb-3">
                            <div class="divider"></div>
                            <div class="col-md">
                                <div id="carouselExampleFade" class="carousel slide carousel-fade"
                                     data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($post->images  as $key => $image)
                                            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                                <img src="/{{$image->url}}" class="d-block w-100" alt="...">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                            data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                            data-bs-target="#carouselExampleFade" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <small class="text-light fw-semibold">Post information</small>
                            <div class="demo-inline-spacing mt-3">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bx bx-tv me-2"></i>
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
                            <div class="divider"></div>
                            <?php
                            echo '<iframe frameborder="0" height="320" width="570"
                                 src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+", $post->address)) . '&z=14&output=embed"></iframe>'; ?>
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
