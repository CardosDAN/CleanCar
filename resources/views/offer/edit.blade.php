<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
      data-assets-path="../assets/" data-template="vertical-menu-template-free">
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
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit offer /</span> Offer</h4>

                    <div class="row">
                        <div class="col-md-12">
                            <form id="formAccountSettings" action="{{ route('offer.update', $offer) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="card mb-4">
                                    <h5 class="card-header">Offer Details</h5>
                                    @if(session('status'))
                                        <div class="alert alert-success" role="alert">
                                            <h4 class="alert-heading"> {{session('status')}}</h4>
                                        </div>
                                    @endif
                                    <!-- Account -->
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="firstName" class="form-label">{{__('Price')}}</label>
                                                <input class="form-control @error('price') is-invalid @enderror" type="text" id="firstName"
                                                       name="price" value="{{$offer->price}}"  autofocus />
                                            </div>
                                            @error('price')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-primary me-2">Save
                                                changes</button>
                                            <button type="reset" href="{{route('offer.index')}}"
                                                    class="btn btn-outline-secondary">Cancel</button>
                                        </div>

                                    </div>
                                    <!-- /Account -->
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
</body>

</html>
