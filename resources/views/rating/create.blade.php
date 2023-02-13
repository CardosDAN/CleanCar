<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
      data-assets-path="../assets/" data-template="vertical-menu-template-free">
@include('layout.head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add post /</span> Post</h4>

                    <div class="row">
                        <div class="col-md-12">
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

                        </div>
                    </div>
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


<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
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
