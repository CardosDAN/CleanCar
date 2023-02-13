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
                <!-- TODO imi afisaza de mai multe ori -->
                @foreach($user_ratings as $rating)
                <div class="container-xxl flex-grow-1 container-p-y">


                    <h4 class="fw-bold py-3 mb-4">
                        <span class="text-muted fw-light">{{__("User / View /")}}</span> {{__("Account")}}
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
                                                 src="{{asset('images'). '/' . 'users' . '/' . $rating->user->image_path}}"
                                                 height="110" width="110" alt="User avatar">
                                            <div class="user-info text-center">
                                                <h4 class="mb-2">{{$rating->user->name}}</h4>
                                                <span class="badge bg-label-secondary">
                                                        @if($rating->user->level_id === 1)
                                                        User
                                                    @elseif($rating->user->level_id === 2)
                                                        Manager
                                                    @elseif($rating->user->level_id === 3)
                                                        Worker
                                                    @elseif($rating->user->level_id === 4)
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
                                                <h5 class="mb-0">1.23k</h5>
                                                <span>Tasks Done</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start mt-3 gap-3">
                                            <span class="badge bg-label-primary p-2 rounded"><i
                                                    class="bx bx-customize bx-sm"></i></span>
                                            <div>
                                                <h5 class="mb-0">568</h5>
                                                <span>Projects Done</span>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="pb-2 border-bottom mb-4">{{__("Details")}}</h5>
                                    <div class="info-container">
                                        <ul class="list-unstyled">
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">{{__("Username:")}}</span>
                                                <span>{{$rating->user->name}}</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">{{__("Email:")}}</span>
                                                <span>{{$rating->user->email}}</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">Status:</span>
                                                <span class="badge bg-label-success">
                                                     @if(Cache::has('is_online' . $rating->user->id))
                                                        <span class="text-success">Online</span>
                                                    @else
                                                        <span class="text-secondary">Offline</span>
                                                    @endif
                                                </span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">Last seen:</span>
                                                <span class="badge bg-label-secondary">
                                                     @if($rating->user->last_seen != null)
                                                        {{ \Carbon\Carbon::parse($rating->user->last_seen)->diffForHumans() }}
                                                    @else
                                                        No data
                                                    @endif
                                                </span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">{{__("Role:")}}</span>
                                                <span>
                                                     @if($rating->user->level_id === 1)
                                                        User
                                                    @elseif($rating->user->level_id === 2)
                                                        Manager
                                                    @elseif($rating->user->level_id === 3)
                                                        Worker
                                                    @elseif($rating->user->level_id === 4)
                                                        Admin
                                                    @endif
                                                </span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">{{__("id:")}}</span>
                                                <span>{{$rating->user->id}}</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">Languages:</span>
                                                <span>French</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /User Card -->
                        </div>
                        <!--/ User Sidebar -->
                        <!-- User Content -->
                        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                            <!-- Project table -->
                            <div class="card mb-4">
                                <h5 class="card-header">{{__("Ratings")}}</h5>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                            <tr>
                                                <th>{{__("Rating")}}</th>
                                                <th>{{__("Comment")}}</th>
                                                <th>{{__("Date")}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <span class="badge bg-label-secondary">
                                                                 <div class="rateyo" id="rating"
                                                                      data-rateyo-rating="{{$rating->rating}}">
                                                                </div>
                                                        </span>
                                                    </td>
                                                    <td>
                                                            <span class="badge bg-label-secondary">
                                                                {{$rating->comment}}
                                                            </span>
                                                    </td>
                                                    <td>
                                                            <span class="badge bg-label-secondary">
                                                                {{$rating->created_at}}
                                                            </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /Project table -->
                        </div>
                        <!--/ User Content -->

                    </div>

                </div>
                <!-- / Content -->
                @endforeach

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>


    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :' + rating);
            $(this).parent().find('input[name=rating]').val(rating);
        });
    });

</script>
</body>
</html>
