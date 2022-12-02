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
                    <!-- Basic Bootstrap Table -->
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading"> {{session('status')}}</h4>
                        </div>
                    @endif
                    <div class="card">

                        <h5 class="card-header">Offer Table</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Post_id</th>
                                    <th>User_id</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                @foreach($offers as $offer)
                                    <tr>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                            <strong>{{$offer->post_id}}</strong></td>
                                        </td>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                            <strong>{{$offer->user_id}}</strong></td>
                                        </td>

                                        <td>{{$offer->price}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{route('offer.edit',$offer)}}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <a class="dropdown-item" href="{{route('offer.show',$offer)}}"><i
                                                            class="bx bx-show-alt me-1"></i> View</a>
                                                    <form method="POST" action="{{route('offer.destroy', $offer)}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item" type="submit" onclick="return confirm('Are you sure?')"><i class="bx bx-trash me-1"></i> Delete</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                {{ $offers->links() }}
                            </table>
                        </div>
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
