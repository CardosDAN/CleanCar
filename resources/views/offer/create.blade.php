<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
      data-assets-path="../assets/" data-template="vertical-menu-template-free">
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

                <div class="container-xxl flex-grow-1 container-p-y">
                    <h4 class="fw-bold py-3 mb-4"><span
                            class="text-muted fw-light">{{__("Add offer /")}}</span>{{__("Offer")}} </h4>

                    <div class="row">
                        <div class="col-md-12">
                            <form id="formAccountSettings" action="{{ route('offer.store') }}" method="POST">
                                @csrf
                                <div class="card mb-4">
                                    <h5 class="card-header">{{__("Offer Details")}}</h5>
                                    <!-- Account -->

                                    <div class="card-body">
                                            <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="successMessage"></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            <div class="divider"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="row">
                                            <?php $post_id = $_GET['post_id']; ?>
                                            <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
                                            <div class="mb-3 col-md-6">
                                                <label for="email" class="form-label">{{__('Price')}}</label>
                                                <input class="form-control @error('price') is-invalid @enderror"
                                                       type="number" id="email"
                                                       name="price"
                                                />

                                                @error('price')
                                                <span>
                                                    <div
                                                        class="alert alert-danger">{{ $message }}</div><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="email" class="form-label">{{__('End date')}}</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control datepicker"  name="end_time"  data-date-format="m/d/Y G:iK" data-enable-time="true">
                                                @error('end_time')
                                                <span>
                                                    <div
                                                        class="alert alert-danger">{{ $message }}</div><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>
                                    <div class="m-4 float-end">
                                        <button type="submit" class="btn btn-primary me-2">Save
                                            changes
                                        </button>
                                        <button type="reset"
                                                class="btn btn-outline-secondary">Cancel
                                        </button>
                                    </div>

                                </div>
                                <!-- /Account -->
                            </form>
                        </div>


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
<!-- / Layout wrapper -->


<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
@include('layout.script')
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
@if(session('status'))
    <script>
        $(document).ready(function() {
            $('#successMessage').text('{{ session('status') }}');
            $('#successModal').modal('show');
        });
    </script>
@endif
</body>

</html>
