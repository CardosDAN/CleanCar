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
                    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add post /</span> Post</h4>

                    <div class="row">
                        <div class="col-md-12">
                            <form id="formAccountSettings" action="{{ route('posts.store') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card mb-4">
                                    <h5 class="card-header">Post Details</h5>
                                    <!-- Account -->

                                    <div class="card-body">
                                        <hr>
                                        <label><h4>{{__('Add a image for your post')}}</h4></label>
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">

                                            <div class="row">
                                                <div class="col">
                                                    <div class="image">

                                                        <input type="file"
                                                               class="form-control"
                                                               name="images[]"
                                                               multiple>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="image">

                                                        <input type="file"
                                                               class="form-control"
                                                               name="images[]"
                                                               multiple>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <hr class="my-0"/>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="firstName" class="form-label">{{__('Add a title')}}</label>
                                                <input class="form-control @error('title') is-invalid @enderror"
                                                       type="text" id="firstName"
                                                       name="title" autofocus/>
                                                @error('title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="email" class="form-label">{{__('Add a description')}}</label>
                                                <input class="form-control @error('post_text') is-invalid @enderror"
                                                       type="text" id="email"
                                                       name="post_text"
                                                />
                                                @error('post_text')
                                                <span class="invalid-feedback" role="alert">
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="email" class="form-label">{{__('Add a phone number witch we can contact you')}}</label>
                                                <input class="form-control @error('Phone') is-invalid @enderror"
                                                       type="number" id="email"
                                                       name="phone"
                                                />
                                                @error('phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="country">{{__("Please select the option which you want for you're car")}}</label>
                                                <select id="country"
                                                        class="select2 form-select @error('category_id') is-invalid @enderror"
                                                        name="category_id">
                                                    @foreach ($categories as $category )
                                                        <option
                                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach

                                                </select>
                                                @error('category_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col">
                                                <label class="form-label" for="country">{{__("Please select the country from where you are")}}</label>
                                                <select id="country-dd" class="form-select">
                                                    <option value="">Select Country</option>
                                                    @foreach ($countries as $data)
                                                        <option value="{{$data->id}}">
                                                            {{$data->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label class="form-label" for="country">{{__("Please select the state")}}</label>
                                                <select id="state-dd" class="form-select">
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label class="form-label" for="country">{{__("Please select the city")}}</label>
                                                <select name="city_id" id="city-dd" class="form-select">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-primary me-2">Save
                                                changes
                                            </button>
                                            <button type="reset"
                                                    class="btn btn-outline-secondary">Cancel
                                            </button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#country-dd').on('change', function () {
            var idCountry = this.value;
            $("#state-dd").html('');
            $.ajax({
                url: "{{url('api/fetch-states')}}",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#state-dd').html('<option value="">Select State</option>');
                    $.each(result.states, function (key, value) {
                        $("#state-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#city-dd').html('<option value="">Select City</option>');
                }
            });
        });
        $('#state-dd').on('change', function () {
            var idState = this.value;
            $("#city-dd").html('');
            console.log(idState);
            $.ajax({
                url: "{{url('api/fetch-cities')}}",
                type: "POST",
                data: {
                    state_id: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#city-dd').html('<option value="">Select City</option>');
                    $.each(res.cities, function (key, value) {
                        $("#city-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>
</body>

</html>
