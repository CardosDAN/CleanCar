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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
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
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{__("Posts /")}}</span>{{__(" All Posts")}}</h4>
                    <div class="row">
                        @foreach($user_posts as $post)
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$post->title}}</h5>
                                        <h6 class="card-subtitle text-muted">{{$post->created_at->diffForHumans()}}</h6>
                                        @foreach($post->images->slice(0, 1) as $image)
                                            <img class="img-fluid d-flex mx-auto my-4" src="{{$image->url}}"
                                                 alt="Card image cap">
                                        @endforeach
                                        <p class="card-text">{{$post->post_text}}</p>
                                        <a href="{{route('posts.show',$post)}}"
                                           class="btn btn-outline-primary float-end">{{__("View")}}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">{{__("Posts /")}}</span>{{__(" All Completed Posts")}}</h4>
                        <div class="row">
                            @foreach($done_posts as $post)
                                <div class="col-md-6 col-lg-4 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$post->title}}</h5>
                                            <h6 class="card-subtitle text-muted">{{$post->created_at->diffForHumans()}}</h6>
                                            @foreach($post->images->slice(0, 1) as $image)
                                                <img class="img-fluid d-flex mx-auto my-4" src="{{$image->url}}"
                                                     alt="Card image cap">
                                            @endforeach
                                            <p class="card-text">{{$post->post_text}}</p>
                                            <a href="{{route('posts.show',$post)}}"
                                               class="btn btn-outline-primary float-end">{{__("View")}}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
