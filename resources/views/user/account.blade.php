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


                    <h4 class="fw-bold py-3 mb-4">
                        <span class="text-muted fw-light">{{__("User / View /")}}</span> {{__("Account")}}
                    </h4>
                    <div class="row">
                        <!-- User Sidebar -->
                        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                            <!-- User Card -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="user-avatar-section">
                                        <div class=" d-flex align-items-center flex-column">
                                            <img class="img-fluid rounded my-4"
                                                 src="{{asset('images'). '/' . 'users' . '/' . $user->image_path}}"
                                                 height="110" width="110" alt="User avatar">
                                            <div class="user-info text-center">
                                                <h4 class="mb-2">{{$user->name}}</h4>
                                                <span class="badge bg-label-secondary">
                                                        @if($user->level_id === 1)
                                                        User
                                                    @elseif($user->level_id === 2)
                                                        Manager
                                                    @elseif($user->level_id === 3)
                                                        Worker
                                                    @elseif($user->level_id === 4)
                                                        Admin
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-around flex-wrap my-4 py-3">
                                        <div class="d-flex align-items-start me-4 mt-3 gap-3">
                                            <span class="badge bg-label-primary p-2 rounded"><i
                                                    class="bx bx-check bx-sm"></i></span>
                                            <div>
                                                <h5 class="mb-0">1.23k</h5>
                                                <span>Tasks Done</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start mt-3 gap-3">
                                            <span class="badge bg-label-primary p-2 rounded"><i
                                                    class="bx bx-customize bx-sm"></i></span>
                                            <div>
                                                <h5 class="mb-0">568</h5>
                                                <span>Projects Done</span>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="pb-2 border-bottom mb-4">{{__("Details")}}</h5>
                                    <div class="info-container">
                                        <ul class="list-unstyled">
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">{{__("Username:")}}</span>
                                                <span>{{$user->name}}</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">{{__("Email:")}}</span>
                                                <span>{{$user->email}}</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">Status:</span>
                                                <span class="badge bg-label-success">Active</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">{{__("Role:")}}</span>
                                                <span>
                                                     @if($user->level_id === 1)
                                                        User
                                                    @elseif($user->level_id === 2)
                                                        Manager
                                                    @elseif($user->level_id === 3)
                                                        Worker
                                                    @elseif($user->level_id === 4)
                                                        Admin
                                                    @endif
                                                </span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">Tax id:</span>
                                                <span>Tax-8965</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">Languages:</span>
                                                <span>French</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-bold me-2">Country:</span>
                                                <span>England</span>
                                            </li>
                                        </ul>
                                        <div class="d-flex justify-content-center pt-3">
                                            <a href="{{route('user.edit',$user)}}" class="btn btn-primary me-3"
                                               data-bs-target="#editUser">Edit</a>
                                            <a href="javascript:;"
                                               class="btn btn-label-danger suspend-user">Suspended</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /User Card -->
                        </div>
                        <!--/ User Sidebar -->
                        <!-- User Content -->
                        <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                            <!-- User Pills -->
                            <ul class="nav nav-pills flex-column flex-md-row mb-3">
                                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i
                                            class="bx bx-user me-1"></i>Account</a></li>
                                <li class="nav-item"><a class="nav-link" href="app-user-view-security.html"><i
                                            class="bx bx-lock-alt me-1"></i>Security</a></li>
                                <li class="nav-item"><a class="nav-link" href="app-user-view-billing.html"><i
                                            class="bx bx-detail me-1"></i>Billing &amp; Plans</a></li>
                                <li class="nav-item"><a class="nav-link" href="app-user-view-notifications.html"><i
                                            class="bx bx-bell me-1"></i>Notifications</a></li>
                                <li class="nav-item"><a class="nav-link" href="app-user-view-connections.html"><i
                                            class="bx bx-link-alt me-1"></i>Connections</a></li>
                            </ul>
                            <!--/ User Pills -->

                            <!-- Project table -->
                            <div class="card mb-4">
                                <h5 class="card-header">User's Projects List</h5>
                                <div class="table-responsive mb-3">
                                    <div id="DataTables_Table_0_wrapper"
                                         class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <div
                                            class="d-flex justify-content-between align-items-center flex-column flex-sm-row mx-4 row">
                                            <div
                                                class="col-sm-4 col-12 d-flex align-items-center justify-content-sm-start justify-content-center">
                                                <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show
                                                        <select name="DataTables_Table_0_length"
                                                                aria-controls="DataTables_Table_0" class="form-select">
                                                            <option value="7">7</option>
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="75">75</option>
                                                            <option value="100">100</option>
                                                        </select></label></div>
                                            </div>
                                            <div
                                                class="col-sm-8 col-12 d-flex align-items-center justify-content-sm-end justify-content-center">
                                                <div id="DataTables_Table_0_filter" class="dataTables_filter"><label>Search:<input
                                                            type="search" class="form-control"
                                                            placeholder="Search Project"
                                                            aria-controls="DataTables_Table_0"></label></div>
                                            </div>
                                        </div>
                                        <table class="table datatable-project border-top dataTable no-footer dtr-column"
                                               id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info"
                                               style="width: 773px;">
                                            <thead>
                                            <tr>
                                                <th class="control sorting dtr-hidden" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    style="width: 0px; display: none;"
                                                    aria-label=": activate to sort column ascending"></th>
                                                <th class="sorting sorting_desc" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    style="width: 287px;"
                                                    aria-label="Project: activate to sort column ascending"
                                                    aria-sort="descending">Project
                                                </th>
                                                <th class="text-nowrap sorting_disabled" rowspan="1" colspan="1"
                                                    style="width: 119px;" aria-label="Total Task">Total Task
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1" style="width: 111px;"
                                                    aria-label="Progress: activate to sort column ascending">Progress
                                                </th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1"
                                                    style="width: 84px;" aria-label="Hours">Hours
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="odd">
                                                <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                                <td class="sorting_1">
                                                    <div class="d-flex justify-content-left align-items-center">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar-sm me-3"><img
                                                                    src="../../assets/img/icons/brands/vue-label.png"
                                                                    alt="Project Image" class="rounded-circle"></div>
                                                        </div>
                                                        <div class="d-flex flex-column"><span
                                                                class="text-truncate fw-semibold">Vue Admin template</span><small
                                                                class="text-muted">Vuejs Project</small></div>
                                                    </div>
                                                </td>
                                                <td class="" style="">214/627</td>
                                                <td>
                                                    <div class="d-flex flex-column"><small class="mb-1">78%</small>
                                                        <div class="progress w-100 me-3" style="height: 6px;">
                                                            <div class="progress-bar bg-success" style="width: 78%"
                                                                 aria-valuenow="78%" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="" style="">88:19h</td>
                                            </tr>
                                            <tr class="even">
                                                <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                                <td class="sorting_1">
                                                    <div class="d-flex justify-content-left align-items-center">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar-sm me-3"><img
                                                                    src="../../assets/img/icons/brands/event-label.png"
                                                                    alt="Project Image" class="rounded-circle"></div>
                                                        </div>
                                                        <div class="d-flex flex-column"><span
                                                                class="text-truncate fw-semibold">Online Webinar</span><small
                                                                class="text-muted">Official Event</small></div>
                                                    </div>
                                                </td>
                                                <td class="" style="">12/20</td>
                                                <td>
                                                    <div class="d-flex flex-column"><small class="mb-1">69%</small>
                                                        <div class="progress w-100 me-3" style="height: 6px;">
                                                            <div class="progress-bar bg-info" style="width: 69%"
                                                                 aria-valuenow="69%" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="" style="">12:12h</td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                                <td class="sorting_1">
                                                    <div class="d-flex justify-content-left align-items-center">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar-sm me-3"><img
                                                                    src="../../assets/img/icons/brands/html-label.png"
                                                                    alt="Project Image" class="rounded-circle"></div>
                                                        </div>
                                                        <div class="d-flex flex-column"><span
                                                                class="text-truncate fw-semibold">Hoffman Website</span><small
                                                                class="text-muted">HTML Project</small></div>
                                                    </div>
                                                </td>
                                                <td class="" style="">56/183</td>
                                                <td>
                                                    <div class="d-flex flex-column"><small class="mb-1">43%</small>
                                                        <div class="progress w-100 me-3" style="height: 6px;">
                                                            <div class="progress-bar bg-warning" style="width: 43%"
                                                                 aria-valuenow="43%" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="" style="">76h</td>
                                            </tr>
                                            <tr class="even">
                                                <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                                <td class="sorting_1">
                                                    <div class="d-flex justify-content-left align-items-center">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar-sm me-3"><img
                                                                    src="../../assets/img/icons/brands/sketch-label.png"
                                                                    alt="Project Image" class="rounded-circle"></div>
                                                        </div>
                                                        <div class="d-flex flex-column"><span
                                                                class="text-truncate fw-semibold">Foodista mobile app</span><small
                                                                class="text-muted">iPhone Project</small></div>
                                                    </div>
                                                </td>
                                                <td class="" style="">12/86</td>
                                                <td>
                                                    <div class="d-flex flex-column"><small class="mb-1">49%</small>
                                                        <div class="progress w-100 me-3" style="height: 6px;">
                                                            <div class="progress-bar bg-warning" style="width: 49%"
                                                                 aria-valuenow="49%" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="" style="">45h</td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                                <td class="sorting_1">
                                                    <div class="d-flex justify-content-left align-items-center">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar-sm me-3"><img
                                                                    src="../../assets/img/icons/brands/xd-label.png"
                                                                    alt="Project Image" class="rounded-circle"></div>
                                                        </div>
                                                        <div class="d-flex flex-column"><span
                                                                class="text-truncate fw-semibold">Falcon Logo Design</span><small
                                                                class="text-muted">UI/UX Project</small></div>
                                                    </div>
                                                </td>
                                                <td class="" style="">9/50</td>
                                                <td>
                                                    <div class="d-flex flex-column"><small class="mb-1">15%</small>
                                                        <div class="progress w-100 me-3" style="height: 6px;">
                                                            <div class="progress-bar bg-danger" style="width: 15%"
                                                                 aria-valuenow="15%" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="" style="">89h</td>
                                            </tr>
                                            <tr class="even">
                                                <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                                <td class="sorting_1">
                                                    <div class="d-flex justify-content-left align-items-center">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar-sm me-3"><img
                                                                    src="../../assets/img/icons/brands/react-label.png"
                                                                    alt="Project Image" class="rounded-circle"></div>
                                                        </div>
                                                        <div class="d-flex flex-column"><span
                                                                class="text-truncate fw-semibold">Dojo React Project</span><small
                                                                class="text-muted">React Project</small></div>
                                                    </div>
                                                </td>
                                                <td class="" style="">234/378</td>
                                                <td>
                                                    <div class="d-flex flex-column"><small class="mb-1">73%</small>
                                                        <div class="progress w-100 me-3" style="height: 6px;">
                                                            <div class="progress-bar bg-info" style="width: 73%"
                                                                 aria-valuenow="73%" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="" style="">67:10h</td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                                <td class="sorting_1">
                                                    <div class="d-flex justify-content-left align-items-center">
                                                        <div class="avatar-wrapper">
                                                            <div class="avatar avatar-sm me-3"><img
                                                                    src="../../assets/img/icons/brands/vue-label.png"
                                                                    alt="Project Image" class="rounded-circle"></div>
                                                        </div>
                                                        <div class="d-flex flex-column"><span
                                                                class="text-truncate fw-semibold">Dashboard Design</span><small
                                                                class="text-muted">Vuejs Project</small></div>
                                                    </div>
                                                </td>
                                                <td class="" style="">100/190</td>
                                                <td>
                                                    <div class="d-flex flex-column"><small class="mb-1">90%</small>
                                                        <div class="progress w-100 me-3" style="height: 6px;">
                                                            <div class="progress-bar bg-success" style="width: 90%"
                                                                 aria-valuenow="90%" aria-valuemin="0"
                                                                 aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="" style="">129:45h</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="d-flex justify-content-between mx-4 row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                                     aria-live="polite">Showing 1 to 7 of 11 entries
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_paginate paging_simple_numbers"
                                                     id="DataTables_Table_0_paginate">
                                                    <ul class="pagination">
                                                        <li class="paginate_button page-item previous disabled"
                                                            id="DataTables_Table_0_previous"><a href="#"
                                                                                                aria-controls="DataTables_Table_0"
                                                                                                data-dt-idx="0"
                                                                                                tabindex="0"
                                                                                                class="page-link">Previous</a>
                                                        </li>
                                                        <li class="paginate_button page-item active"><a href="#"
                                                                                                        aria-controls="DataTables_Table_0"
                                                                                                        data-dt-idx="1"
                                                                                                        tabindex="0"
                                                                                                        class="page-link">1</a>
                                                        </li>
                                                        <li class="paginate_button page-item "><a href="#"
                                                                                                  aria-controls="DataTables_Table_0"
                                                                                                  data-dt-idx="2"
                                                                                                  tabindex="0"
                                                                                                  class="page-link">2</a>
                                                        </li>
                                                        <li class="paginate_button page-item next"
                                                            id="DataTables_Table_0_next"><a href="#"
                                                                                            aria-controls="DataTables_Table_0"
                                                                                            data-dt-idx="3" tabindex="0"
                                                                                            class="page-link">Next</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Project table -->

                            <!-- Activity Timeline -->
                            <div class="card mb-4">
                                <h5 class="card-header">User Activity Timeline</h5>
                                <div class="card-body">
                                    <ul class="timeline">
                                        <li class="timeline-item timeline-item-transparent">
                                            <span class="timeline-point timeline-point-primary"></span>
                                            <div class="timeline-event">
                                                <div class="timeline-header mb-1">
                                                    <h6 class="mb-0">12 Invoices have been paid</h6>
                                                    <small class="text-muted">12 min ago</small>
                                                </div>
                                                <p class="mb-2">Invoices have been paid to the company</p>
                                                <div class="d-flex">
                                                    <a href="javascript:void(0)" class="me-3">
                                                        <img src="../../assets/img/icons/misc/pdf.png" alt="PDF image"
                                                             width="15" class="me-2">
                                                        <span class="fw-bold text-body">invoices.pdf</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-item timeline-item-transparent">
                                            <span class="timeline-point timeline-point-warning"></span>
                                            <div class="timeline-event">
                                                <div class="timeline-header mb-1">
                                                    <h6 class="mb-0">Client Meeting</h6>
                                                    <small class="text-muted">45 min ago</small>
                                                </div>
                                                <p class="mb-2">Project meeting with john @10:15am</p>
                                                <div class="d-flex flex-wrap">
                                                    <div class="avatar me-3">
                                                        <img src="../../assets/img/avatars/3.png" alt="Avatar"
                                                             class="rounded-circle">
                                                    </div>
                                                    <div>
                                                        <h6 class="mb-0">Lester McCarthy (Client)</h6>
                                                        <span class="text-muted">CEO of ThemeSelection</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-item timeline-item-transparent">
                                            <span class="timeline-point timeline-point-info"></span>
                                            <div class="timeline-event">
                                                <div class="timeline-header mb-1">
                                                    <h6 class="mb-0">Create a new project for client</h6>
                                                    <small class="text-muted">2 Day Ago</small>
                                                </div>
                                                <p class="mb-2">5 team members in a project</p>
                                                <div class="d-flex align-items-center avatar-group">
                                                    <div class="avatar pull-up" data-bs-toggle="tooltip"
                                                         data-popup="tooltip-custom" data-bs-placement="top"
                                                         aria-label="Vinnie Mostowy">
                                                        <img src="../../assets/img/avatars/5.png" alt="Avatar"
                                                             class="rounded-circle">
                                                    </div>
                                                    <div class="avatar pull-up" data-bs-toggle="tooltip"
                                                         data-popup="tooltip-custom" data-bs-placement="top"
                                                         aria-label="Marrie Patty">
                                                        <img src="../../assets/img/avatars/12.png" alt="Avatar"
                                                             class="rounded-circle">
                                                    </div>
                                                    <div class="avatar pull-up" data-bs-toggle="tooltip"
                                                         data-popup="tooltip-custom" data-bs-placement="top"
                                                         aria-label="Jimmy Jackson">
                                                        <img src="../../assets/img/avatars/9.png" alt="Avatar"
                                                             class="rounded-circle">
                                                    </div>
                                                    <div class="avatar pull-up" data-bs-toggle="tooltip"
                                                         data-popup="tooltip-custom" data-bs-placement="top"
                                                         aria-label="Kristine Gill">
                                                        <img src="../../assets/img/avatars/6.png" alt="Avatar"
                                                             class="rounded-circle">
                                                    </div>
                                                    <div class="avatar pull-up" data-bs-toggle="tooltip"
                                                         data-popup="tooltip-custom" data-bs-placement="top"
                                                         aria-label="Nelson Wilson">
                                                        <img src="../../assets/img/avatars/14.png" alt="Avatar"
                                                             class="rounded-circle">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="timeline-item timeline-item-transparent">
                                            <span class="timeline-point timeline-point-success"></span>
                                            <div class="timeline-event">
                                                <div class="timeline-header mb-1">
                                                    <h6 class="mb-0">Design Review</h6>
                                                    <small class="text-muted">5 days Ago</small>
                                                </div>
                                                <p class="mb-0">Weekly review of freshly prepared design for our new
                                                    app.</p>
                                            </div>
                                        </li>
                                        <li class="timeline-end-indicator">
                                            <i class="bx bx-check-circle"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /Activity Timeline -->

                            <!-- Invoice table -->
                            <div class="card mb-4">
                                <div class="table-responsive mb-3">
                                    <div id="DataTables_Table_1_wrapper"
                                         class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <div class="row mx-4">
                                            <div
                                                class="col-sm-6 col-12 d-flex align-items-center justify-content-center justify-content-sm-start mb-3 mb-md-0">
                                                <div class="dataTables_length" id="DataTables_Table_1_length">
                                                    <label><select name="DataTables_Table_1_length"
                                                                   aria-controls="DataTables_Table_1"
                                                                   class="form-select">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select></label></div>
                                            </div>
                                            <div
                                                class="col-sm-6 col-12 d-flex align-items-center justify-content-center justify-content-sm-end">
                                                <div class="dt-buttons">
                                                    <button
                                                        class="dt-button buttons-collection btn btn-label-secondary dropdown-toggle float-sm-end mb-3 mb-sm-0"
                                                        tabindex="0" aria-controls="DataTables_Table_1" type="button"
                                                        aria-haspopup="dialog" aria-expanded="false"><span><i
                                                                class="bx bx-upload me-2"></i>Export</span><span
                                                            class="dt-down-arrow">▼</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table datatable-invoice border-top dataTable no-footer dtr-column"
                                               id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"
                                               style="width: 772px;">
                                            <thead>
                                            <tr>
                                                <th class="control sorting dtr-hidden" tabindex="0"
                                                    aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                                                    style="width: 0px; display: none;"
                                                    aria-label=": activate to sort column ascending"></th>
                                                <th class="sorting sorting_desc" tabindex="0"
                                                    aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                                                    style="width: 87px;"
                                                    aria-label="ID: activate to sort column ascending"
                                                    aria-sort="descending">ID
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1"
                                                    rowspan="1" colspan="1" style="width: 62px;"
                                                    aria-label=": activate to sort column ascending"><i
                                                        class="bx bx-trending-up"></i></th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1"
                                                    rowspan="1" colspan="1" style="width: 92px;"
                                                    aria-label="Total: activate to sort column ascending">Total
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1"
                                                    rowspan="1" colspan="1" style="width: 163px;"
                                                    aria-label="Issued Date: activate to sort column ascending">Issued
                                                    Date
                                                </th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1"
                                                    style="width: 144px;" aria-label="Actions">Actions
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="odd">
                                                <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                                <td class="sorting_1"><a href="app-invoice-preview.html">#5089</a></td>
                                                <td><span data-bs-toggle="tooltip" data-bs-html="true"
                                                          aria-label="<span>Sent<br> <strong>Balance:</strong> 0<br> <strong>Due Date:</strong> 05/09/2020</span>"><span
                                                            class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30 "><i
                                                                class="bx bx-mail-send bx-xs"></i></span></span></td>
                                                <td>$3077</td>
                                                <td>05/02/2020</td>
                                                <td class="" style="">
                                                    <div class="d-flex align-items-center"><a href="javascript:;"
                                                                                              class="text-body"
                                                                                              data-bs-toggle="tooltip"
                                                                                              aria-label="Send Mail"><i
                                                                class="bx bx-paper-plane mx-1"></i></a><a
                                                            href="app-invoice-preview.html" class="text-body"
                                                            data-bs-toggle="tooltip" aria-label="Preview"><i
                                                                class="bx bx-show-alt mx-1"></i></a><a
                                                            href="javascript:;" class="text-body"
                                                            data-bs-toggle="tooltip" aria-label="Download"><i
                                                                class="bx bx-download mx-1"></i></a></div>
                                                </td>
                                            </tr>
                                            <tr class="even">
                                                <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                                <td class="sorting_1"><a href="app-invoice-preview.html">#5041</a></td>
                                                <td><span data-bs-toggle="tooltip" data-bs-html="true"
                                                          aria-label="<span>Sent<br> <strong>Balance:</strong> 0<br> <strong>Due Date:</strong> 11/19/2020</span>"><span
                                                            class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30 "><i
                                                                class="bx bx-mail-send bx-xs"></i></span></span></td>
                                                <td>$2230</td>
                                                <td>02/01/2021</td>
                                                <td class="" style="">
                                                    <div class="d-flex align-items-center"><a href="javascript:;"
                                                                                              class="text-body"
                                                                                              data-bs-toggle="tooltip"
                                                                                              aria-label="Send Mail"><i
                                                                class="bx bx-paper-plane mx-1"></i></a><a
                                                            href="app-invoice-preview.html" class="text-body"
                                                            data-bs-toggle="tooltip" aria-label="Preview"><i
                                                                class="bx bx-show-alt mx-1"></i></a><a
                                                            href="javascript:;" class="text-body"
                                                            data-bs-toggle="tooltip" aria-label="Download"><i
                                                                class="bx bx-download mx-1"></i></a></div>
                                                </td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                                <td class="sorting_1"><a href="app-invoice-preview.html">#5027</a></td>
                                                <td><span data-bs-toggle="tooltip" data-bs-html="true"
                                                          aria-label="<span>Partial Payment<br> <strong>Balance:</strong> 0<br> <strong>Due Date:</strong> 09/25/2020</span>"><span
                                                            class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30"><i
                                                                class="bx bx-adjust bx-xs"></i></span></span></td>
                                                <td>$2787</td>
                                                <td>09/28/2020</td>
                                                <td class="" style="">
                                                    <div class="d-flex align-items-center"><a href="javascript:;"
                                                                                              class="text-body"
                                                                                              data-bs-toggle="tooltip"
                                                                                              aria-label="Send Mail"><i
                                                                class="bx bx-paper-plane mx-1"></i></a><a
                                                            href="app-invoice-preview.html" class="text-body"
                                                            data-bs-toggle="tooltip" aria-label="Preview"><i
                                                                class="bx bx-show-alt mx-1"></i></a><a
                                                            href="javascript:;" class="text-body"
                                                            data-bs-toggle="tooltip" aria-label="Download"><i
                                                                class="bx bx-download mx-1"></i></a></div>
                                                </td>
                                            </tr>
                                            <tr class="even">
                                                <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                                <td class="sorting_1"><a href="app-invoice-preview.html">#5024</a></td>
                                                <td><span data-bs-toggle="tooltip" data-bs-html="true"
                                                          aria-label="<span>Partial Payment<br> <strong>Balance:</strong> -$202<br> <strong>Due Date:</strong> 08/02/2020</span>"><span
                                                            class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30"><i
                                                                class="bx bx-adjust bx-xs"></i></span></span></td>
                                                <td>$5285</td>
                                                <td>06/30/2020</td>
                                                <td class="" style="">
                                                    <div class="d-flex align-items-center"><a href="javascript:;"
                                                                                              class="text-body"
                                                                                              data-bs-toggle="tooltip"
                                                                                              aria-label="Send Mail"><i
                                                                class="bx bx-paper-plane mx-1"></i></a><a
                                                            href="app-invoice-preview.html" class="text-body"
                                                            data-bs-toggle="tooltip" aria-label="Preview"><i
                                                                class="bx bx-show-alt mx-1"></i></a><a
                                                            href="javascript:;" class="text-body"
                                                            data-bs-toggle="tooltip" aria-label="Download"><i
                                                                class="bx bx-download mx-1"></i></a></div>
                                                </td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                                <td class="sorting_1"><a href="app-invoice-preview.html">#5020</a></td>
                                                <td><span data-bs-toggle="tooltip" data-bs-html="true"
                                                          aria-label="<span>Downloaded<br> <strong>Balance:</strong> 0<br> <strong>Due Date:</strong> 12/15/2020</span>"><span
                                                            class="badge badge-center rounded-pill bg-label-info w-px-30 h-px-30"><i
                                                                class="bx bx-down-arrow-circle bx-xs"></i></span></span>
                                                </td>
                                                <td>$5219</td>
                                                <td>07/17/2020</td>
                                                <td class="" style="">
                                                    <div class="d-flex align-items-center"><a href="javascript:;"
                                                                                              class="text-body"
                                                                                              data-bs-toggle="tooltip"
                                                                                              aria-label="Send Mail"><i
                                                                class="bx bx-paper-plane mx-1"></i></a><a
                                                            href="app-invoice-preview.html" class="text-body"
                                                            data-bs-toggle="tooltip" aria-label="Preview"><i
                                                                class="bx bx-show-alt mx-1"></i></a><a
                                                            href="javascript:;" class="text-body"
                                                            data-bs-toggle="tooltip" aria-label="Download"><i
                                                                class="bx bx-download mx-1"></i></a></div>
                                                </td>
                                            </tr>
                                            <tr class="even">
                                                <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                                <td class="sorting_1"><a href="app-invoice-preview.html">#4995</a></td>
                                                <td><span data-bs-toggle="tooltip" data-bs-html="true"
                                                          aria-label="<span>Partial Payment<br> <strong>Balance:</strong> 0<br> <strong>Due Date:</strong> 06/09/2020</span>"><span
                                                            class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30"><i
                                                                class="bx bx-adjust bx-xs"></i></span></span></td>
                                                <td>$3313</td>
                                                <td>08/21/2020</td>
                                                <td class="" style="">
                                                    <div class="d-flex align-items-center"><a href="javascript:;"
                                                                                              class="text-body"
                                                                                              data-bs-toggle="tooltip"
                                                                                              aria-label="Send Mail"><i
                                                                class="bx bx-paper-plane mx-1"></i></a><a
                                                            href="app-invoice-preview.html" class="text-body"
                                                            data-bs-toggle="tooltip" aria-label="Preview"><i
                                                                class="bx bx-show-alt mx-1"></i></a><a
                                                            href="javascript:;" class="text-body"
                                                            data-bs-toggle="tooltip" aria-label="Download"><i
                                                                class="bx bx-download mx-1"></i></a></div>
                                                </td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                                <td class="sorting_1"><a href="app-invoice-preview.html">#4993</a></td>
                                                <td><span data-bs-toggle="tooltip" data-bs-html="true"
                                                          aria-label="<span>Partial Payment<br> <strong>Balance:</strong> 0<br> <strong>Due Date:</strong> 10/22/2020</span>"><span
                                                            class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30"><i
                                                                class="bx bx-adjust bx-xs"></i></span></span></td>
                                                <td>$4836</td>
                                                <td>07/10/2020</td>
                                                <td class="" style="">
                                                    <div class="d-flex align-items-center"><a href="javascript:;"
                                                                                              class="text-body"
                                                                                              data-bs-toggle="tooltip"
                                                                                              aria-label="Send Mail"><i
                                                                class="bx bx-paper-plane mx-1"></i></a><a
                                                            href="app-invoice-preview.html" class="text-body"
                                                            data-bs-toggle="tooltip" aria-label="Preview"><i
                                                                class="bx bx-show-alt mx-1"></i></a><a
                                                            href="javascript:;" class="text-body"
                                                            data-bs-toggle="tooltip" aria-label="Download"><i
                                                                class="bx bx-download mx-1"></i></a></div>
                                                </td>
                                            </tr>
                                            <tr class="even">
                                                <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                                <td class="sorting_1"><a href="app-invoice-preview.html">#4989</a></td>
                                                <td><span data-bs-toggle="tooltip" data-bs-html="true"
                                                          aria-label="<span>Past Due<br> <strong>Balance:</strong> 0<br> <strong>Due Date:</strong> 08/01/2020</span>"><span
                                                            class="badge badge-center rounded-pill bg-label-danger w-px-30 h-px-30"><i
                                                                class="bx bx-info-circle bx-xs"></i></span></span></td>
                                                <td>$5293</td>
                                                <td>07/30/2020</td>
                                                <td class="" style="">
                                                    <div class="d-flex align-items-center"><a href="javascript:;"
                                                                                              class="text-body"
                                                                                              data-bs-toggle="tooltip"
                                                                                              aria-label="Send Mail"><i
                                                                class="bx bx-paper-plane mx-1"></i></a><a
                                                            href="app-invoice-preview.html" class="text-body"
                                                            data-bs-toggle="tooltip" aria-label="Preview"><i
                                                                class="bx bx-show-alt mx-1"></i></a><a
                                                            href="javascript:;" class="text-body"
                                                            data-bs-toggle="tooltip" aria-label="Download"><i
                                                                class="bx bx-download mx-1"></i></a></div>
                                                </td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                                <td class="sorting_1"><a href="app-invoice-preview.html">#4989</a></td>
                                                <td><span data-bs-toggle="tooltip" data-bs-html="true"
                                                          aria-label="<span>Downloaded<br> <strong>Balance:</strong> 0<br> <strong>Due Date:</strong> 09/23/2020</span>"><span
                                                            class="badge badge-center rounded-pill bg-label-info w-px-30 h-px-30"><i
                                                                class="bx bx-down-arrow-circle bx-xs"></i></span></span>
                                                </td>
                                                <td>$3623</td>
                                                <td>12/01/2020</td>
                                                <td class="" style="">
                                                    <div class="d-flex align-items-center"><a href="javascript:;"
                                                                                              class="text-body"
                                                                                              data-bs-toggle="tooltip"
                                                                                              aria-label="Send Mail"><i
                                                                class="bx bx-paper-plane mx-1"></i></a><a
                                                            href="app-invoice-preview.html" class="text-body"
                                                            data-bs-toggle="tooltip" aria-label="Preview"><i
                                                                class="bx bx-show-alt mx-1"></i></a><a
                                                            href="javascript:;" class="text-body"
                                                            data-bs-toggle="tooltip" aria-label="Download"><i
                                                                class="bx bx-download mx-1"></i></a></div>
                                                </td>
                                            </tr>
                                            <tr class="even">
                                                <td class="control dtr-hidden" tabindex="0" style="display: none;"></td>
                                                <td class="sorting_1"><a href="app-invoice-preview.html">#4965</a></td>
                                                <td><span data-bs-toggle="tooltip" data-bs-html="true"
                                                          aria-label="<span>Partial Payment<br> <strong>Balance:</strong> $666<br> <strong>Due Date:</strong> 03/18/2021</span>"><span
                                                            class="badge badge-center rounded-pill bg-label-success w-px-30 h-px-30"><i
                                                                class="bx bx-adjust bx-xs"></i></span></span></td>
                                                <td>$3789</td>
                                                <td>09/27/2020</td>
                                                <td class="" style="">
                                                    <div class="d-flex align-items-center"><a href="javascript:;"
                                                                                              class="text-body"
                                                                                              data-bs-toggle="tooltip"
                                                                                              aria-label="Send Mail"><i
                                                                class="bx bx-paper-plane mx-1"></i></a><a
                                                            href="app-invoice-preview.html" class="text-body"
                                                            data-bs-toggle="tooltip" aria-label="Preview"><i
                                                                class="bx bx-show-alt mx-1"></i></a><a
                                                            href="javascript:;" class="text-body"
                                                            data-bs-toggle="tooltip" aria-label="Download"><i
                                                                class="bx bx-download mx-1"></i></a></div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="row mx-4">
                                            <div class="col-md-12 col-lg-6 text-center text-lg-start pb-md-2 pb-lg-0">
                                                <div class="dataTables_info" id="DataTables_Table_1_info" role="status"
                                                     aria-live="polite">Showing 1 to 10 of 50 entries
                                                </div>
                                            </div>
                                            <div
                                                class="col-md-12 col-lg-6 d-flex justify-content-center justify-content-lg-end">
                                                <div class="dataTables_paginate paging_simple_numbers"
                                                     id="DataTables_Table_1_paginate">
                                                    <ul class="pagination">
                                                        <li class="paginate_button page-item previous disabled"
                                                            id="DataTables_Table_1_previous"><a href="#"
                                                                                                aria-controls="DataTables_Table_1"
                                                                                                data-dt-idx="0"
                                                                                                tabindex="0"
                                                                                                class="page-link">Previous</a>
                                                        </li>
                                                        <li class="paginate_button page-item active"><a href="#"
                                                                                                        aria-controls="DataTables_Table_1"
                                                                                                        data-dt-idx="1"
                                                                                                        tabindex="0"
                                                                                                        class="page-link">1</a>
                                                        </li>
                                                        <li class="paginate_button page-item "><a href="#"
                                                                                                  aria-controls="DataTables_Table_1"
                                                                                                  data-dt-idx="2"
                                                                                                  tabindex="0"
                                                                                                  class="page-link">2</a>
                                                        </li>
                                                        <li class="paginate_button page-item "><a href="#"
                                                                                                  aria-controls="DataTables_Table_1"
                                                                                                  data-dt-idx="3"
                                                                                                  tabindex="0"
                                                                                                  class="page-link">3</a>
                                                        </li>
                                                        <li class="paginate_button page-item "><a href="#"
                                                                                                  aria-controls="DataTables_Table_1"
                                                                                                  data-dt-idx="4"
                                                                                                  tabindex="0"
                                                                                                  class="page-link">4</a>
                                                        </li>
                                                        <li class="paginate_button page-item "><a href="#"
                                                                                                  aria-controls="DataTables_Table_1"
                                                                                                  data-dt-idx="5"
                                                                                                  tabindex="0"
                                                                                                  class="page-link">5</a>
                                                        </li>
                                                        <li class="paginate_button page-item next"
                                                            id="DataTables_Table_1_next"><a href="#"
                                                                                            aria-controls="DataTables_Table_1"
                                                                                            data-dt-idx="6" tabindex="0"
                                                                                            class="page-link">Next</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Invoice table -->
                        </div>
                        <!--/ User Content -->
                    </div>

                    <!-- Add New Credit Card Modal -->
                    <div class="modal fade" id="upgradePlanModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-simple modal-upgrade-plan">
                            <div class="modal-content p-3 p-md-5">
                                <div class="modal-body">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    <div class="text-center mb-4">
                                        <h3>Upgrade Plan</h3>
                                        <p>Choose the best plan for user.</p>
                                    </div>
                                    <form id="upgradePlanForm" class="row g-3" onsubmit="return false">
                                        <div class="col-sm-9">
                                            <label class="form-label" for="choosePlan">Choose Plan</label>
                                            <select id="choosePlan" name="choosePlan" class="form-select"
                                                    aria-label="Choose Plan">
                                                <option selected="">Choose Plan</option>
                                                <option value="standard">Standard - $99/month</option>
                                                <option value="exclusive">Exclusive - $249/month</option>
                                                <option value="Enterprise">Enterprise - $499/month</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3 d-flex align-items-end">
                                            <button type="submit" class="btn btn-primary">Upgrade</button>
                                        </div>
                                    </form>
                                </div>
                                <hr class="mx-md-n5 mx-n3">
                                <div class="modal-body">
                                    <h6 class="mb-0">User current plan is standard plan</h6>
                                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                                        <div class="d-flex justify-content-center me-2 mt-3">
                                            <sup class="h5 pricing-currency pt-1 mt-3 mb-0 me-1 text-primary">$</sup>
                                            <h1 class="display-3 mb-0 text-primary">99</h1>
                                            <sub class="h5 pricing-duration mt-auto mb-2">/month</sub>
                                        </div>
                                        <button class="btn btn-label-danger cancel-subscription mt-3">Cancel
                                            Subscription
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Add New Credit Card Modal -->

                    <!-- /Modal -->

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
