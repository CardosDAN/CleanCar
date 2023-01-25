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

                <div class="container-xxl  container-p-y">
                    <div class="row">
                        <div class="col">
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
                            <select id="state-dd" class="form-select">
                            </select>
                        </div>
                        <div class="col">
                            <select id="city-dd" class="form-select">
                            </select>
                        </div>
                        <div class="col">
                            <select id="category_select" class="form-select">
                                <option value="">Toate categoriile</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                    <div class="divider"></div>
                    <!-- / Content -->
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-lg-4 mb-3">
                                <div id="results">

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
</div>

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
<script>
    let categorySelect = document.querySelector("#category_select");
    let citySelect = document.querySelector("#city-dd");
    let resultsDiv = document.querySelector("#results");

    categorySelect.addEventListener("change", function () {
        let categoryId = this.value;
        let cityId = citySelect.value;

        $.ajax({
            type: "GET",
            url: "{{url('api/fetch-posts')}}",
            data: {category_id: categoryId, city_id: cityId},
            success: function (result) {
                resultsDiv.innerHTML = "";
                if (result && result.length) {
                    result.forEach(function (post) {
                        let card = document.createElement("div");
                        card.classList.add("card");

                        if (post.images && post.images.length) {
                            let image = document.createElement("img");
                            image.classList.add("card-img-top");
                            image.src = post.images[0].url;
                            image.alt = "Card image cap";
                            card.appendChild(image);
                        }

                        let cardBody = document.createElement("div");
                        cardBody.classList.add("card-body");

                        let title = document.createElement("h5");
                        title.classList.add("card-title");
                        title.textContent = post.title;

                        let description = document.createElement("p");
                        description.classList.add("card-text");
                        description.textContent = post.post_text;

                        let id = document.createElement("a");
                        id.classList.add("btn");
                        id.classList.add("btn-outline-primary");
                        id.textContent = "View post";
                        id.href = "/posts/" + post.id;


                        cardBody.appendChild(title);
                        cardBody.appendChild(description);
                        card.appendChild(cardBody);
                        card.appendChild(id);
                        resultsDiv.appendChild(card);
                    });
                } else {
                    console.log("No data received from the server");
                }
            },
            error: function (xhr, status, error) {
                console.log("An error occurred: " + error);
            }
        });
    });
    citySelect.addEventListener("change", function () {
        let cityId = this.value;
        let categoryId = categorySelect.value;

        $.ajax({
            type: "GET",
            url: "{{url('api/fetch-posts')}}",
            data: {category_id: categoryId, city_id: cityId},
            success: function (result) {
                resultsDiv.innerHTML = "";
                if (result && result.length) {
                    result.forEach(function (post) {
                        let card = document.createElement("div");
                        card.classList.add("card");

                        if (post.images && post.images.length) {
                            let image = document.createElement("img");
                            image.classList.add("card-img-top");
                            image.src = post.images[0].url;
                            image.alt = "Card image cap";
                            card.appendChild(image);
                        }

                        let cardBody = document.createElement("div");
                        cardBody.classList.add("card-body");

                        let title = document.createElement("h5");
                        title.classList.add("card-title");
                        title.textContent = post.title;

                        let description = document.createElement("p");
                        description.classList.add("card-text");
                        description.textContent = post.post_text;

                        let id = document.createElement("a");
                        id.classList.add("btn");
                        id.classList.add("btn-outline-primary");
                        id.textContent = "View post";
                        id.href = "/posts/" + post.id;

                        cardBody.appendChild(title);
                        cardBody.appendChild(description);
                        card.appendChild(cardBody);
                        card.appendChild(id);
                        resultsDiv.appendChild(card);
                    });
                } else {
                    console.log("No data received from the server");
                }
            },
        });
    });
</script>

</body>
</html>
