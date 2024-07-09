<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="UniStay">
    <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">

    <title>UniStay</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.css') }}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('backend/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/demo2/style.css') }}">
    <!-- End layout styles -->

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style type="text/css">   
        .apexcharts-legend {   
        display: flex;   
        overflow: auto;   
        padding: 0 10px;   
        }   
        .apexcharts-legend.apx-legend-position-bottom, .apexcharts-legend.apx-legend-position-top {   
        flex-wrap: wrap   
        }   
        .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {   
        flex-direction: column;   
        bottom: 0;   
        }   
        .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left, .apexcharts-legend.apx-legend-position-top.apexcharts-align-left, .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {   
        justify-content: flex-start;   
        }   
        .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center, .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {   
        justify-content: center;    
        }   
        .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right, .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {   
        justify-content: flex-end;   
        }   
        .apexcharts-legend-series {   
        cursor: pointer;   
        line-height: normal;   
        }   
        .apexcharts-legend.apx-legend-position-bottom .apexcharts-legend-series, .apexcharts-legend.apx-legend-position-top .apexcharts-legend-series{   
        display: flex;   
        align-items: center;   
        }   
        .apexcharts-legend-text {   
        position: relative;   
        font-size: 14px;   
        }   
        .apexcharts-legend-text *, .apexcharts-legend-marker * {   
        pointer-events: none;   
        }   
        .apexcharts-legend-marker {   
        position: relative;   
        display: inline-block;   
        cursor: pointer;   
        margin-right: 3px;   
        border-style: solid;
        }   

        .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series, .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series{   
        display: inline-block;   
        }   
        .apexcharts-legend-series.apexcharts-no-click {   
        cursor: auto;   
        }   
        .apexcharts-legend .apexcharts-hidden-zero-series, .apexcharts-legend .apexcharts-hidden-null-series {   
        display: none !important;   
        }   
        .apexcharts-inactive-legend {   
        opacity: 0.45;   
        }
    </style>

</head>
<body>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        @include('admin/sidebar')
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            @include('admin/navBar')
            <!-- partial -->

            <div class="page-content">
                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                    <div>
                      <h4 class="mb-3 mb-md-0">Analytics</h4>
                    </div>
                    <div class="d-flex align-items-center flex-wrap text-nowrap">
                      <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                        <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
                        <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
                      </div>
                    </div>
                  </div>
				
				<div class="card-body">
					<div class="mb-3 justify-content-center">
						<label for="chart">User Data</label>
					</div>
					<div class="card">
						<div id="chart"></div>
					</div>
				</div>
				<br>
				<br>

				<div class="card-body">
					<div class="mb-3 justify-content-center">
						<label for="chart">Listings Data</label>
					</div>
					<div class="card">
						<div id="propertyChart"></div>
					</div>
				</div>

            </div>
        </div>
    <!-- core:js -->
    <script src="{{ asset('backend/assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{ asset('backend/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ asset('backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/template.js') }}"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="{{ asset('backend/assets/js/dashboard-dark.js') }}"></script>
    <!-- End custom js for this page -->

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        // ApexCharts initialization
        var usersData = @json($users);
        var agentsData = @json($agents);
        var propertiesData = @json($properties);

        var userDates = usersData.map(function(user) {
            return user.date;
        });
        var userCounts = usersData.map(function(user) {
            return user.count;
        });

        var agentDates = agentsData.map(function(agent) {
            return agent.date;
        });
        var agentCounts = agentsData.map(function(agent) {
            return agent.count;
        });

        var propertyDates = propertiesData.map(function(property) {
            return property.date;
        });
        var propertyCounts = propertiesData.map(function(property) {
            return property.count;
        });

        var allDates = [...new Set([...userDates, ...agentDates, ...propertyDates])].sort();

        var userSeries = allDates.map(function(date) {
            var index = userDates.indexOf(date);
            return index !== -1 ? userCounts[index] : 0;
        });

        var agentSeries = allDates.map(function(date) {
            var index = agentDates.indexOf(date);
            return index !== -1 ? agentCounts[index] : 0;
        });

        var propertySeries = allDates.map(function(date) {
            var index = propertyDates.indexOf(date);
            return index !== -1 ? propertyCounts[index] : 0;
        });

        var options = {
            chart: {
                type: 'line',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            series: [
                {
                    name: 'Students',
                    data: userSeries
                },
                {
                    name: 'Agents',
                    data: agentSeries
                }
            ],
            xaxis: {
                categories: allDates
            },
            legend: {
                position: 'top'
            }
        };

        var propertyOptions = {
            chart: {
                type: 'line',
                height: 350,
                toolbar: {
                    show: false
                }
            },
            series: [
                {
                    name: 'Properties',
                    data: propertySeries
                }
            ],
            xaxis: {
                categories: allDates
            },
            legend: {
                position: 'top'
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        var propertyChart = new ApexCharts(document.querySelector("#propertyChart"), propertyOptions);
        propertyChart.render();

    </script>
</body>
</html>
