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
                            <form id="formAccountSettings" action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="card mb-4">
                                    <h5 class="card-header">Post Details</h5>
                                    <!-- Account -->

                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <div class="image">
                                                <label><h4>{{__('Add image')}}</h4></label>
                                                @foreach($post->images as $image)
                                                    <input type="file" class="form-control"  name="images[]" value="{{$image->url}}" multiple>
                                                @endforeach

                                            </div>

                                        </div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label for="firstName" class="form-label">{{__('Title')}}</label>
                                                <input class="form-control @error('title') is-invalid @enderror" type="text" id="firstName"
                                                       name="title" value="{{$post->title}}"  autofocus />
                                            </div>
                                            @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="mb-3 col-md-6">
                                                <label for="email" class="form-label  ">{{__('Description')}}</label>
                                                <input class="form-control @error('post_text') is-invalid @enderror" type="text" id="email" value="{{$post->post_text}}"
                                                       name="post_text"
                                                />
                                                @error('post_text')
                                                <span class="invalid-feedback" role="alert">
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label for="email" class="form-label">{{__('Address')}}</label>
                                                <input class="form-control @error('address') is-invalid @enderror" type="text" id="email" value="{{$post->address}}"
                                                       name="address"
                                                />
                                                @error('address')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label" for="country">Category</label>
                                                <select id="country" class="select2 form-select @error('category_id') is-invalid @enderror" name="category_id">
                                                    @foreach ($categories as $category )
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach

                                                </select>
                                                @error('category_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <button type="submit" class="btn btn-primary me-2">Save
                                                changes</button>
                                            <button type="reset" href="{{route('posts.index')}}"
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
