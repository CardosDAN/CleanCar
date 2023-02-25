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

                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <div class="col-lg-8 mb-4 order-0">
                            <div class="card">
                                <div class="d-flex align-items-end row">
                                    <div class="col-sm-7">
                                        <div class="card-body">
                                            <h5 class="card-title text-primary">{{__("Greetings ")}}  {{auth()->user()->name}}
                                                ! 🎉 </h5>
                                            <p class="mb-4">
                                                {{__("This is the admin dashboard")}}
                                            </p>
                                            <div class="divider"></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 text-center text-sm-left">
                                        <div class="card-body pb-0 px-0 px-md-4">
                                            <img
                                                src="{{asset('../assets/img/illustrations/man-with-laptop-light.png')}}"
                                                height="140"
                                                alt="View Badge User"
                                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                                data-app-light-img="illustrations/man-with-laptop-light.png"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 order-1">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-6 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title d-flex align-items-start justify-content-between">
                                                <div class="avatar flex-shrink-0">
                                                    <img
                                                        src="{{asset('../assets/img/icons/unicons/chart-success.png')}}"
                                                        alt="chart success"
                                                        class="rounded"
                                                    />
                                                </div>
                                                <div class="dropdown">
                                                    <button
                                                        class="btn p-0"
                                                        type="button"
                                                        id="cardOpt6"
                                                        data-bs-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false"
                                                    >
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end"
                                                         aria-labelledby="cardOpt6">
                                                        <a class="dropdown-item"
                                                           href="{{route('user.index')}}">{{__("View More")}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="fw-semibold d-block mb-1">{{__("Users")}}</span>
                                            <h3 class="card-title mb-2">{{$user_count}}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-6 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title d-flex align-items-start justify-content-between">
                                                <div class="avatar flex-shrink-0">
                                                    <img
                                                        src="{{asset('../assets/img/icons/unicons/wallet-info.png')}}"
                                                        alt="Credit Card"
                                                        class="rounded"
                                                    />
                                                </div>
                                                <div class="dropdown">
                                                    <button
                                                        class="btn p-0"
                                                        type="button"
                                                        id="cardOpt6"
                                                        data-bs-toggle="dropdown"
                                                        aria-haspopup="true"
                                                        aria-expanded="false"
                                                    >
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end"
                                                         aria-labelledby="cardOpt6">
                                                        <a class="dropdown-item"
                                                           href="{{route('posts.index')}}">{{__("View More")}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <span>{{__("Posts")}}</span>
                                            <h3 class="card-title text-nowrap mb-1">{{$posts_count}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Revenue -->
                        <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                            <div class="card">
                                <div class="row row-bordered g-0">
                                    <div class="col-md-8">
                                        <canvas class="px-2" id="myChart"></canvas>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="text-nowrap mb-2">{{__("Site Growth")}}</h5>
                                                </div>
                                                <div class="col">
                                                    <span
                                                        class="badge bg-label-warning rounded-pill">{{__("Year 2023")}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="userGrowthChart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Total Revenue -->
                        <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                            <div class="row">

                                <!-- </div>
                <div class="row"> -->
                                <div class="col-12 mb-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 class="text-nowrap mb-2">{{__("Active Users Report")}}</h5>
                                                </div>
                                                <div class="col">
                                                    <span
                                                        class="badge bg-label-warning rounded-pill">{{__("Year 2023")}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                                <div id="activeUsersChart"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Order Statistics -->
                        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                            <div class="card h-100">
                                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                                    <div class="card-title mb-0">
                                        <h5 class="m-0 me-2">{{__("Connections Statistics")}} </h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="d-flex flex-column align-items-center gap-1">
                                            <h2 class="mb-2">{{$user_count}}</h2>
                                            <span>{{__("Total Connections")}}</span>
                                        </div>
                                        <div id="userConnectionsChart"></div>
                                    </div>
                                    <ul class="p-0 m-0">
                                        <li class="d-flex mb-4 pb-1">
                                            <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-primary"
                            ><i class="tf-icon bx bxl-facebook"></i
                                ></span>
                                            </div>
                                            <div
                                                class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                <div class="me-2">
                                                    <h6 class="mb-0">{{__("Facebook")}}</h6>
                                                </div>
                                                <div class="user-progress">
                                                    <small class="fw-semibold">{{$facebookCount}}</small>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex mb-4 pb-1">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <span class="avatar-initial rounded bg-label-warning"><i
                                                        class="tf-icon bx bxl-google-plus"></i></span>
                                            </div>
                                            <div
                                                class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                <div class="me-2">
                                                    <h6 class="mb-0">{{__("Google")}}</h6>
                                                </div>
                                                <div class="user-progress">
                                                    <small class="fw-semibold">{{$googleCount}}</small>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex mb-4 pb-1">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <span class="avatar-initial rounded " style="color: purple; background: lightgrey"><i
                                                        class="tf-icons bx bxl-github"></i></span>
                                            </div>
                                            <div
                                                class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                <div class="me-2">
                                                    <h6 class="mb-0">{{__("Github")}}</h6>
                                                </div>
                                                <div class="user-progress">
                                                    <small class="fw-semibold">{{$githubCount}}</small>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex">
                                            <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-secondary"
                            ><i class="bx bx-log-in"></i
                                ></span>
                                            </div>
                                            <div
                                                class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                <div class="me-2">
                                                    <h6 class="mb-0">{{__("Site")}}</h6>
                                                </div>
                                                <div class="user-progress">
                                                    <small class="fw-semibold">{{$user_count}}</small>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--/ Order Statistics -->

                        <!-- Transactions -->
                        <div class="col-md-6 col-lg-4 order-2 mb-4">
                            <div class="card h-100">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="card-title m-0 me-2">{{__("Levels")}}</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="p-0 m-0">
                                        <li class="d-flex mb-4 pb-1">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <img src="{{asset('../assets/img/icons/unicons/paypal.png')}}"
                                                     alt="User" class="rounded"/>
                                            </div>
                                            <div
                                                class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                <div class="me-2">
                                                    <small class="text-muted d-block mb-1">{{__("Users")}}</small>
                                                </div>
                                                <div class="user-progress d-flex align-items-center gap-1">
                                                    <h6 class="mb-0">{{$user_level_count}}</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex mb-4 pb-1">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <img src="{{asset('../assets/img/icons/unicons/wallet.png')}}"
                                                     alt="User" class="rounded"/>
                                            </div>
                                            <div
                                                class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                <div class="me-2">
                                                    <small class="text-muted d-block mb-1">{{__("Workers")}}</small>
                                                </div>
                                                <div class="user-progress d-flex align-items-center gap-1">
                                                    <h6 class="mb-0">{{$worker_level_count}}</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex mb-4 pb-1">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <img src="{{asset('../assets/img/icons/unicons/chart.png')}}" alt="User"
                                                     class="rounded"/>
                                            </div>
                                            <div
                                                class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                <div class="me-2">
                                                    <small class="text-muted d-block mb-1">{{__("Managers")}}</small>
                                                </div>
                                                <div class="user-progress d-flex align-items-center gap-1">
                                                    <h6 class="mb-0">{{$manager_level_count}}</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex mb-4 pb-1">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <img src="{{asset('../assets/img/icons/unicons/cc-success.png')}}"
                                                     alt="User" class="rounded"/>
                                            </div>
                                            <div
                                                class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                <div class="me-2">
                                                    <small class="text-muted d-block mb-1">{{__("Admins")}}</small>
                                                </div>
                                                <div class="user-progress d-flex align-items-center gap-1">
                                                    <h6 class="mb-0">{{$admin_level_count}}</h6>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <hr>
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <div class="d-flex flex-column align-items-center gap-1">
                                            <h2 class="mb-2">{{4}}</h2>
                                            <span>{{__("Total Level Users")}}</span>
                                        </div>
                                        <div id="userLevelsChart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ Transactions -->
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


@include('layout.script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const math = Math.floor(Date.now() / 1000) - 7 * 24 * 60 * 60
    const activeUsersChartEl = document.querySelector('#activeUsersChart');

    fetch('/reports/active-users?since=' + math)
        .then(response => response.json())
        .then(data => {
            const activeUsersChart = new ApexCharts(activeUsersChartEl, {
                chart: {
                    height: 300,
                    type: 'line',
                    toolbar: {
                        show: false
                    }
                },
                series: [
                    {
                        name: 'Active Users',
                        data: data.map(row => row.active_users)
                    }
                ],
                xaxis: {
                    type: 'datetime',
                    categories: data.map(row => row.date)
                }
            });

            activeUsersChart.render();
        });
</script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($chartData['labels']) !!},
            datasets: [{
                label: 'Completed Offers',
                data: {!! json_encode($chartData['data']) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(128, 128, 128, 0.2)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    const userGrowthChartEl = document.querySelector('#userGrowthChart');

    const userGrowthChartOptions = {
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            },
            toolbar: {
                show: false
            }
        },
        series: [{
            name: 'Users',
            data: {!! json_encode($chartDataGrowth['data']) !!}
        }],
        xaxis: {
            categories: {!! json_encode($chartDataGrowth['labels']) !!}
        },
        stroke: {
            curve: 'smooth'
        },
        markers: {
            size: 5,
            colors: config.colors.primary,
            strokeWidth: 0,
            hover: {
                size: 7
            }
        },
        colors: [config.colors.primary],
        grid: {
            padding: {
                left: 5,
                right: 5
            }
        },
        dataLabels: {
            enabled: false
        }
    };

    if (typeof userGrowthChartEl !== undefined && userGrowthChartEl !== null) {
        const userGrowthChart = new ApexCharts(userGrowthChartEl, userGrowthChartOptions);
        userGrowthChart.render();
    }
</script>
<script>
    const chartUserConnections = document.querySelector('#userConnectionsChart');
    const cardColor = '#f5f5f5';
    let headingColor = '#fff';
    let axisColor = '#b3b3b3';
    const userConnectionsConfig = {
        chart: {
            height: 165,
            width: 130,
            type: 'donut'
        },
        labels: {!! json_encode($labels) !!},
        series: {!! json_encode($series) !!},
        colors: [config.colors.primary, config.colors.secondary, config.colors.info, config.colors.success],
        stroke: {
            width: 5,
            colors: cardColor
        },
        dataLabels: {
            enabled: false,
            formatter: function (val, opt) {
                return parseInt(val) + '%';
            }
        },
        legend: {
            show: false
        },
        grid: {
            padding: {
                top: 0,
                bottom: 0,
                right: 15
            }
        },
        plotOptions: {
            pie: {
                donut: {
                    size: '75%',
                    labels: {
                        show: true,
                        value: {
                            fontSize: '1.5rem',
                            fontFamily: 'Public Sans',
                            color: headingColor,
                            offsetY: -15,
                            formatter: function (val) {
                                return parseInt(val) + '%';
                            }
                        },
                        name: {
                            offsetY: 20,
                            fontFamily: 'Public Sans'
                        },
                        total: {
                            show: true,
                            fontSize: '0.8125rem',
                            color: axisColor,
                            label: 'Weekly',
                            formatter: function (w) {
                                return '38%';
                            }
                        }
                    }
                }
            }
        }
    };
    if (typeof chartUserConnections !== undefined && chartUserConnections !== null) {
        const userConnectionsChart = new ApexCharts(chartUserConnections, userConnectionsConfig);
        userConnectionsChart.render();
    }
</script>
<script>
    const chartUserLevels = document.querySelector('#userLevelsChart');
    const userLevelsConfig = {
        chart: {
            height: 165,
            width: 130,
            type: 'donut'
        },
        labels: {!! json_encode($labels_level) !!},
        series: {!! json_encode($series_level) !!},
        colors: [config.colors.primary, config.colors.secondary, config.colors.info, config.colors.success],
        stroke: {
            width: 5,
            colors: cardColor
        },
        dataLabels: {
            enabled: false,
            formatter: function (val, opt) {
                return parseInt(val) + '%';
            }
        },
        legend: {
            show: false
        },
        grid: {
            padding: {
                top: 0,
                bottom: 0,
                right: 15
            }
        },
        plotOptions: {
            pie: {
                donut: {
                    size: '75%',
                    labels: {
                        show: true,
                        value: {
                            fontSize: '1.5rem',
                            fontFamily: 'Public Sans',
                            color: headingColor,
                            offsetY: -15,
                            formatter: function (val) {
                                return parseInt(val) + '%';
                            }
                        },
                        name: {
                            offsetY: 20,
                            fontFamily: 'Public Sans'
                        },
                        total: {
                            show: true,
                            fontSize: '0.8125rem',
                            color: axisColor,
                            label: '',
                        }
                    }
                }
            }
        }
    };
    if (typeof chartUserLevels !== undefined && chartUserLevels !== null) {
        const userLevelsChart = new ApexCharts(chartUserLevels, userLevelsConfig);
        userLevelsChart.render();
    }
</script>
</body>
</html>
