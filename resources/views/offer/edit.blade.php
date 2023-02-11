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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

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
                                            @if($offer->post->user_id == auth()->user()->id && $offer->accepted === 0 && $offer->deleted === 0)
                                                <th class="text-nowrap sorting_disabled"
                                                    aria-label="Total Task">Actions
                                                </th>
                                            @endif
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
                                            @if($offer->post->user_id == auth()->user()->id && $offer->accepted === 0 && $offer->deleted === 0)
                                                <td class="" style="">
                                                    <div class="row">
                                                        <div class="col">
                                                            @if($offer->accepted == 0)
                                                                <a class="btn btn-outline-success"
                                                                   href="{{route('offer.accept', $offer->id)}}">{{__("Accept")}}</a>
                                                            @endif
                                                            @if($offer->deleted == 0)
                                                                <a class="btn btn-outline-danger"
                                                                   href="{{route('offer.delete', $offer->id)}}">{{__("Reject")}}</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>

                                        </tbody>
                                    </table>
                                    @if($offer->accepted === 0 && $offer->deleted === 0)
                                        <form id="formAccountSettings" action="{{ route('offer.update', $offer) }}"
                                              method="POST" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class=" ">
                                                <h5 class="card-header">Offer Details</h5>
                                                @if(session('status'))
                                                    <div class="alert alert-success" role="alert">
                                                        <h4 class="alert-heading"> {{session('status')}}</h4>
                                                    </div>
                                                @endif
                                                <!-- Account -->
                                                @error('price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <hr class="my-0"/>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <label for="firstName"
                                                               class="form-label">{{__('Price')}}</label>
                                                        <div class="col-md-8">
                                                            <input
                                                                class="form-control @error('price') is-invalid @enderror"
                                                                type="text" id="firstName"
                                                                name="price" value="{{$offer->price}}" autofocus/>
                                                        </div>
                                                        <div class="col-md-8 mt-2">
                                                            <label for="firstName"
                                                                   class="form-label">{{__('Finish time')}}</label>
                                                            <input type="text"
                                                                   class="form-control datepicker @error('end_time') is-invalid @enderror"
                                                                   value="{{$offer->end_time}}" name="end_time"
                                                                   data-date-format="m/d/Y G:iK"
                                                                   data-enable-time="true">
                                                        </div>
                                                        <div class="col">
                                                            <button type="submit" class="btn btn-primary me-2">Save
                                                                changes
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!-- /Account -->
                                                </div>
                                            </div>
                                        </form>
                                    @endif
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
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    $('.datepicker').flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today",
        todayHighlight: true,
        time_24hr: true,
    });
</script>
@include('layout.script')
</body>
</html>
