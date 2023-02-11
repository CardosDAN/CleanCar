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
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Offers /</span> All Offers</h4>
                    <div class="row">
                        @foreach($user_offers as $offer)
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$offer->post->title}}</h5>
                                        <h6 class="card-subtitle text-muted">{{$offer->created_at->diffForHumans()}}</h6>
                                        @foreach($offer->post->images->slice(0, 1) as $image)
                                            <img class="img-fluid d-flex mx-auto my-4" src="{{$image->url}}"
                                                 alt="Card image cap">
                                        @endforeach
                                        <p class="card-text">{{$offer->post->post_text}}</p>
                                        <p class="text-muted">{{$offer->user->name}}</p>
                                        <a href="{{route('offer.edit',$offer)}}" class="card-link float-end">View</a>
                                        <a href="{{route('rating.create')}}" class="card-link float-end">Check Offer</a>
                                        <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#modalCenter"> Check Offer
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Vertically Centered Modal -->
                            <div class="col-lg-4 col-md-6">
                                <div class="mt-3">
                                    <!-- Modal -->
                                    <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalCenterTitle">{{__("Job completed")}}</h5>
                                                    <button
                                                        type="button"
                                                        class="btn-close"
                                                        data-bs-dismiss="modal"
                                                        aria-label="Close"
                                                    ></button>
                                                </div>
                                                @if($offer->end_time <= \Carbon\Carbon::now())
                                                    <form action="{{route('rating.store')}}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="rateyo" id="rating"
                                                                 data-rateyo-rating="0"
                                                                 data-rateyo-num-stars="5"
                                                                 data-rateyo-score="3">
                                                            </div>
                                                            <br>
                                                            <span class='result'>Rating: 0</span>
                                                            <input type="hidden" name="rating">
                                                            <input type="hidden" name="user_id" value="{{$offer->user_id}}">
                                                            <div class="divider"></div>
                                                            <label for="exampleFormControlTextarea1">{{__("Write a comment about the job completion")}}</label>
                                                            <textarea class="form-control  @error('comment') is-invalid @enderror" type="text" name="comment" id="exampleFormControlTextarea1" placeholder="Review" rows="3"></textarea>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                                {{__("Close")}}
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">{{__("Send")}}</button>
                                                        </div>
                                                    </form>
                                                    @else
                                                    <img class="col-md-12"
                                                         src="{{asset('../assets/img/illustrations/Tiny comic man running in hurry doing job on clock dial.jpg')}}"--}}
                                                         alt="image"/>
                                                @endif
                                            </div>
                                        </div>
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
