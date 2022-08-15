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
                    <div class="row">
                        <div class="col-lg-8 mb-4 order-0">
                            <div class="card">
                                <div class="d-flex align-items-end row">
                                    <div class="col-sm-7">
                                        <div class="card-body">
                                            <h5 class="card-title text-primary">{{__('Hi')}} {{\Illuminate\Support\Facades\Auth::user()->name}}  {{ __(' , search the job you want to
                                                do next!') }}</h5>
                                            <p class="mb-4">
                                                You have done <span class="fw-bold">72</span> {{ __('jobs this week.') }}
                                            </p>
                                            <button type="button"
                                                    class="btn btn-primary dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                {{__('Jobs')}}
                                            </button>
                                            <ul class="dropdown-menu" style="">
                                                @foreach($categories as $category)
                                                    <li><a class="dropdown-item"
                                                           href="{{route('posts_all')}}?category_id={{$category->id}}">{{$category->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 text-center text-sm-left">
                                        <div class="card-body pb-0 px-0 px-md-4">
                                            <img
                                                src="{{asset('../assets/img/illustrations/man-with-laptop-light.png')}}"
                                                height="140"
                                                alt="View Badge User"
                                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                                data-app-light-img="illustrations/man-with-laptop-light.png"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- / Content -->
                <div class="container">
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card h-100">
                                    @foreach($post->images->slice(0, 1) as $image)
                                        <img class="card-img-top" src="{{$image->url}}" alt="Card image cap">
                                    @endforeach

                                    <div class="card-body">
                                        <h5 class="card-title">{{$post->title}}</h5>
                                        <p class="card-text">
                                            {{$post->post_text}}
                                        </p>
                                        <a href="{{route('posts.show', $post->id)}}" class="btn btn-outline-primary">View post</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
