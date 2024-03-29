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
                    <div class="row justify-content-between">
                        <div class="col-md-5  mb-3 shadow-lg rounded">
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
                            <p class="text-light fw-semibold">Post information</p>
                            <div class="demo-inline-spacing mt-3">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bx bx-tv me-2"></i>
                                        {{$offer->post->title}}
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bx bx-time me-2"></i>
                                        {{$offer->post->created_at->diffForHumans()}}
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bx bx-phone-call me-2"></i>
                                        {{$offer->post->phone}}
                                    </li>
                                </ul>
                                <h3 class="text-lighter fw-semibold"> {{__("Description")}}</h3>
                                <p class="text-center fw-lighter">{{$offer->post->post_text}}</p>
                            </div>
                            <div class="divider"></div>
                        </div>
                        <div class="col-md-6 m-lg-auto shadow-lg ">
                            <div class="divider"></div>
                            @if(session('status'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    {{session('status')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @endif

                            <h5 class="card-header">{{__("Offers List")}}</h5>
                            <div class="table-responsive mb-3">
                                <div id="DataTables_Table_0_wrapper"
                                     class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <table class="table datatable-project border-top dataTable no-footer dtr-column"
                                           id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info"
                                    >
                                        <thead>
                                        <tr>
                                            <th class="text-nowrap sorting_disabled" rowspan="1" colspan="1"
                                                aria-label="Total Task">From
                                            </th>
                                            <th class="text-nowrap sorting_disabled" rowspan="1" colspan="1"
                                                aria-label="Total Task">Price
                                            </th>
                                            <th class="text-nowrap sorting_disabled" rowspan="1" colspan="1"
                                                aria-label="Total Task">Completion date
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="odd">
                                            <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                            <td class="sorting_1">

                                                <div class="d-flex justify-content-left align-items-center">
                                                    <div class="d-flex flex-column"><span
                                                            class="text-truncate fw-semibold">{{$offer->user->name}}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="" style=""> {{$offer->price}}</td>
                                            <td class="" style=""> {{$offer->end_time}}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
