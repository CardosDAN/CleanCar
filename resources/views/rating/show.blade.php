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
                        <div class="col-md-10  mb-3 shadow-lg rounded">
                            <div class="divider"></div>
                            <p class="text-light fw-semibold">{{__("Rating information")}}</p>
                            <div class="demo-inline-spacing mt-3">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bx bx-user me-2"></i>
                                        {{$rating->user->name}}
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bx bx-time me-2"></i>
                                        {{$rating->created_at->diffForHumans()}}
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <i class="bx bx-star me-2"></i>
                                        <div class="rateyo" id="rating"
                                             data-rateyo-rating="{{$rating->rating}}">
                                        </div>

                                    </li>
                                </ul>
                                <h3 class="text-lighter fw-semibold"> {{__("Comment")}}</h3>
                                <p class="text-center fw-lighter">{{$rating->comment}}</p>
                            </div>
                            <div class="divider"></div>
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
