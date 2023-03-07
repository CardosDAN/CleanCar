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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
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
<div class="divider"></div>
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme">
    <div class="container-fluid">
        <a class="navbar-brand" href="javascript:void(0)">CleanCar</a>

        <div class="float-end" id="navbar-ex-3">
            @if (Route::has('login'))
                <div class="">
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-info">Home/</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</nav>
<div class="divider"></div>
<div class="container shadow bg-light">
    <div class="divider"></div>
    <h2 class="h1-responsive font-weight-bold text-center my-4 text-primary">{{__("About us")}}</h2>
    <hr>
    <div class="row mb-5">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3">
                <div class="card-body">
                    <p class="blockquote-footer text-black text-center">
                        We are a team of passionate car enthusiasts who are dedicated to helping car owners find
                        reliable and trustworthy car washers in their area. Our platform connects car owners
                        with skilled workers who can provide professional car washing services at an affordable
                        price.
                    </p>
                </div>
                <img class="card-img-bottom" src="{{asset("../assets/img/elements/21.jpg")}}" alt="Card image cap">
            </div>
        </div>
        <div class="col-md">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body text-center ">
                            <p class="card-text ">
                                Our goal is to make car washing easy and hassle-free for everyone. We understand that
                                finding a good car washer can be difficult, especially if you're new to an area or don't
                                have any personal recommendations. That's why we've created a platform where car owners
                                can quickly and easily post their car washing needs and receive competitive offers from
                                skilled workers.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img class="card-img card-img-right" src="{{asset("../assets/img/elements/Carwash.jpg")}}"
                             alt="Card image">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <blockquote class="blockquote mb-0 text-start">
                                <p class="blockquote-footer text-black">
                                    At our core, we believe in providing our users with the highest level of customer service
                                    and support. If you have any questions or concerns about our platform, please don't hesitate
                                    to contact us. We're here to help you find the perfect car washer for your needs.
                                </p>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <blockquote class="blockquote mb-0 text-center">
                                <p>
                                        Thank you for choosing our platform and for trusting us with your car washing needs. We look
                                    forward to helping you find the perfect worker for your car washing needs.
                                </p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="divider"></div>
</div>
<div class="container shadow bg-light ">
    <!--Section: Contact v.2-->
    <section class="mb-4">
        <div class="divider"></div>
        <!--Section heading-->
        <h2 class="h1-responsive font-weight-bold text-center my-4 text-primary">{{__("Contact us")}}</h2>
        <hr>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-5">{{__("Do you have any questions?
            Please do not hesitate to contact us directly. Our team will come back to you within
            a matter of hours to help you.")}}</p>

        <div class="row">

            <!--Grid column-->
            <div class="col-md-9 mb-md-0 mb-5">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form method="POST" action="{{ route('contact.us.store') }}" id="contactUSForm">
                    @csrf
                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form m-2">
                                <label for="name" class="">Your name</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form m-2">
                                <label for="email" class="">Your email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                       value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form m-2">
                                <label for="subject" class="">Subject</label>
                                <input type="text" id="subject" name="subject" class="form-control"
                                       value="{{ old('subject') }}">
                                @if ($errors->has('subject'))
                                    <span class="text-danger">{{ $errors->first('subject') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-12">

                            <div class="md-form m-2">
                                <label for="message">Your message</label>
                                <textarea type="text" id="message" name="message" rows="2"
                                          class="form-control md-textarea">{{ old('message') }}</textarea>
                                @if ($errors->has('message'))
                                    <span class="text-danger">{{ $errors->first('message') }}</span>
                                @endif
                            </div>

                        </div>
                    </div>
                    <!--Grid row-->
                    <div class="float-end">
                        <button class="btn btn-primary" type="submit">Send</button>
                    </div>
                </form>


            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-3 text-center">
                <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-map-marker-alt fa-2x"></i>
                        <p>{{__("Jibou, 123, Romania")}}</p>
                    </li>

                    <li><i class="fas fa-phone mt-4 fa-2x"></i>
                        <p>{{__("+ 01 234 567 89")}}</p>
                    </li>

                    <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                        <p>{{__("cardosdan08@gmail.com")}}</p>
                    </li>
                </ul>
            </div>
            <!--Grid column-->

        </div>
        <div class="divider"></div>

    </section>
    <!--Section: Contact v.2-->
</div>
<!-- Layout wrapper -->
<!-- / Layout wrapper -->


@include('layout.script')
</body>
</html>
