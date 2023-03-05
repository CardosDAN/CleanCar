<nav
    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar"
>
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        <ul class="navbar-nav flex-row align-items-center ms-auto">

            <!-- User -->
            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
                   data-bs-auto-close="outside" aria-expanded="false">
                    <i class="bx bx-bell bx-sm"></i>
                    <span id="notification_count" class="badge bg-danger rounded-pill badge-notifications"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end py-0">
                    <li class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                            <h5 class="text-body mb-0 me-auto">Notification</h5>
                            <a href="{{route('notifications.read_all')}}" class="dropdown-notifications-all text-body"
                               data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Mark all as read"><i
                                    class="bx fs-4 bx-envelope-open"></i></a>
                        </div>
                    </li>
                    <li class="dropdown-notifications-list overflow-auto ps ">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                <div id="notifications-container">

                                </div>
                            </li>
                        </ul>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                        </div>
                    </li>
                    <li class="dropdown-menu-footer border-top">
                        <a href="{{route('user.show',\Illuminate\Support\Facades\Auth::user())}}" class="dropdown-item d-flex justify-content-center p-3">
                            {{__("View all notifications")}}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{asset('images'). '/' .'users'. '/'. Auth::user()->image_path}}" alt
                             class="w-px-40 h-auto rounded-circle"/>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{asset('images'). '/' . 'users' . '/' . Auth::user()->image_path}}"
                                             alt class="w-px-40 h-auto rounded-circle"/>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                    <small class="text-muted">
                                        @if(\Illuminate\Support\Facades\Auth::user()->level_id === 1)
                                            User
                                        @elseif(\Illuminate\Support\Facades\Auth::user()->level_id === 2)
                                            Manager
                                        @elseif(\Illuminate\Support\Facades\Auth::user()->level_id === 3)
                                            Worker
                                        @elseif(\Illuminate\Support\Facades\Auth::user()->level_id === 4)
                                            Admin
                                        @endif
                                    </small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('user.show',\Illuminate\Support\Facades\Auth::user())}}">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">{{__('My Profile')}}</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('user.edit',\Illuminate\Support\Facades\Auth::user())}}">
                            <i class="bx bx-cog me-2"></i>
                            <span class="align-middle">{{__("Settings")}}</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('application.create')}}">
                            <i class="bx bx-plus-circle me-2"></i>
                            <span class="align-middle">{{__("Become a Worker")}}</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">{{ __('Logout') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function getNotifications() {
        $.ajax({
            url: "api/fetch-notifications",
            type: "GET",
            success: function (data) {
                $('#notifications-container').html('');
                data.forEach(function (notification) {
                    let date = moment(notification.created_at).fromNow();
                    if (notification.message.indexOf('deleted') > -1) {
                        var toastClass = 'bg-danger';
                        var icon = 'bx-x-circle';
                        var coloricon = 'btn-danger';
                    } else {
                        var toastClass = 'bg-success';
                        var icon = 'bx-check-circle';
                        var coloricon = 'btn-success';
                    }
                    if(notification.message.indexOf('waiting') > -1) {
                        var toastClass = 'bg-warning';
                        var icon = 'bx-warning-circle';
                        var coloricon = 'btn-warning';
                    }
                    let toast = `<br>
                    <div class="bs-toast toast fade show ${toastClass}" role="alert" aria-live="assertive" aria-atomic="true">
                                        <div class="toast-header">
                                            <a href="${notification.link}" class="btn ${coloricon} btn-sm">
                                                <i class="bx ${icon} me-2"></i>
                                            </a>
                                            <div class="me-auto fw-semibold">${notification.message}</div>
                                                <small>${date}</small>
                                                <form method="POST" action="/notifications/${notification.id}/read">
                                                    @csrf
                                                    <button type="submit" class="btn-close btn-mark-as-read"  data-bs-dismiss="toast" aria-label="Close"></button>
                                                </form>
                                            </div>
                                            <div class="toast-body">

                                        </div>
                                        </div>

                    </div>`;
                    $('#notifications-container').append(toast);
                });
            }
        });
    }

    $('form').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: form.serialize(),
            success: function (data) {
                $(form).closest('.bs-toast').removeClass('bg-danger').addClass('bg-success');
            }
        });
    });

    function displayNotificationsCount() {
        $.ajax({
            url: "api/fetch-notifications-count",
            type: "GET",
            success: function (data) {
                $("#notification_count").text(data);
            }
        });
    }

    setInterval(function () {
        getNotifications();
        displayNotificationsCount();
    }, 60000);

    $(document).on('click', '.btn-mark-as-read', function () {
        var id = $(this).data('id');
        $.ajax({
            url: "api/mark-as-read/" + id,
            type: "GET",
            success: function (data) {
            },
            error: function (xhr, status, error) {
                console.log("An error occurred: " + error);
            }
        });
    });
</script>
