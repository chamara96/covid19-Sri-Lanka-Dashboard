<?php
//Prefecture Data- columns only


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Starter Page | Apaxy - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- chamara -->
    <link rel="stylesheet" href="css/circle.css">

    <!-- github -->
    <style>
        html,
        body {
            height: 100%;
        }

        #chart_container {
            height: 90%
        }

        .trends-chart {
            display: inline-block;
            width: 100%;
            height: 400px;
            padding-bottom: 30px;
        }

        .single-chart {
            display: inline-block;
            width: 100%;
            height: 100%;
            padding-bottom: 30px;
        }

        .summary-chart {
            display: inline-block;
            width: 100%;
            height: 400px;
            padding-bottom: 30px;
        }

        @media only screen and (min-width: 800px) {
            .trends-chart {
                width: 50%
            }

            .summary-chart {
                width: 50%
            }
        }

        @media only screen and (min-width: 1200px) {
            .trends-chart {
                width: 50%
            }
        }

        @media only screen and (min-width: 2000px) {
            .trends-chart {
                width: 33%
            }
        }
    </style>
    <link href="assets_2/bootstrap.min.css" rel="stylesheet">
    <script src="assets_2/axios.min.js"></script>
    <script src="assets_2/echarts.min.js"></script>
    <!-- ================= -->

    <!-- chamara -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>


    <style>
        body {
            background-image: url('assets/images/corona-04.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100%;
        }

        .dropdown-menu {
            width: 400px !important;
            /* height: 400px !important; */
        }
    </style>

</head>

<body data-topbar="dark" data-layout="horizontal">

    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <!-- <a href="index.php" class="logo">
                            <span class="logo-sm">
                                <img src="assets/images/ncovid19.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/ncovid19.png" alt="" height="19">
                            </span>
                        </a> -->

                        <a href="index.php" class="logo">
                            <span class="logo-sm">
                                <!-- <img src="assets/images/logo-sm-light.png" alt="" height="22"> -->
                                <h1 class="text-light">COVID-19</h1>
                            </span>
                            <span class="logo-lg">
                                <!-- <img src="assets/images/logo-light.png" alt="" height="19"> -->
                                <div class="row">
                                    <h1 class="text-light">COVID-19&nbsp;&nbsp;</h1>
                                    <h4 class="text-light">&nbsp;stay HOME stay SAFE</h4>
                                </div>

                            </span>
                        </a>
                    </div>

                </div>

                <div class="d-flex">
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="assets/images/GitHub.png" alt="Header Avatar">
                            <span class="d-none d-sm-inline-block ml-1">Info</span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- ======================== -->
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg mx-auto">
                                        <ul class="list-group ">
                                            <li class="list-group-item border-left-0 border-right-0 d-flex pl-0">
                                                <i class="fab fa-github"></i>&nbsp;Github
                                                <a class="pl-3" href="https://github.com/chamara96">https://github.com/chamara96</a>
                                            </li>
                                            <li class="list-group-item border-left-0 border-right-0 d-flex pl-0">
                                                <i class="fab fa-linkedin"></i>&nbsp;LinkedIn
                                                <a class="pl-3" href="www.linkedin.com/in/chamara-herath-838446172">LinkedIn</a>
                                            </li>
                                            <li class="list-group-item border-left-0 border-right-0 d-flex pl-0">
                                                <i class="fas fa-globe"></i>&nbsp;Web
                                                <a class="pl-3" href="https://chamaralabs.com">https://chamaralabs.com</a>
                                            </li>
                                            <li class="list-group-item border-left-0 border-right-0 d-flex pl-0">
                                                <i class="fa fa-book"></i>&nbsp;Data Sources
                                                <a class="pl-3" href="https://docs.google.com/spreadsheets/u/0/d/1zIgPU0ZlYkiKaavYAUcHKgEP95jdaMaf9ljJgRqtog4/htmlview#">Google Sheet</a>
                                                <a class="pl-3" href="https://hpb.health.gov.lk/en/api-documentation">hpb.health.gov.lk API</a>
                                            </li>
                                            <li class="list-group-item border-left-0 border-right-0 d-flex pl-0">
                                                <i class="fas fa-phone"></i>
                                                <span class="pl-3">+94702697490</span>
                                            </li>
                                            <li class="list-group-item border-left-0 border-right-0 d-flex pl-0">
                                                <i class="fas fa-envelope"></i>
                                                <a class="pl-3" href=mailto:cmb.info96@gmail.com>cmb.info96@gmail.com</a>
                                            </li>
                                            <p style="color:blue;font-size:11px;">Graphical representations connect to China repo, therefore actual data can be slightly differ.</p>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- ======================== -->
                        </div>
                    </div>
                </div>


            </div>
        </header>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">Sri Lanka Data Analysis</h4>

                                <!-- <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Apaxy</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Starter Page</li>
                                    </ol>
                                </div> -->

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!-- <div class="row">

                    </div> -->

                    <button type="button" class="btn btn-dark"><a class="text-light" href="index.php">Home</a></button>


                    <div style="width=100%" id="accordion">

                        <!-- hospital data -->
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Hospital Data
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">

                                    <h4 class="header-title">Hospital Data</h4>
                                    <p class="card-title-desc">Data Source <code><a href="https://hpb.health.gov.lk/en/api-documentation">https://hpb.health.gov.lk/en/api-documentation</a></code> API service.</p>

                                    <div class="table-responsive">
                                        <table class="table table-sm m-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Hospital Name</th>
                                                    <th>Cumulative Local</th>
                                                    <th>Cumulative Foreign</th>
                                                    <th>Treatment Local</th>
                                                    <th>Treatment Foreign</th>
                                                    <th>Cumulative Total</th>
                                                    <th>Treatment Total</th>
                                                    <th>Updated</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $json_prefecture_data = file_get_contents("http://hpb.health.gov.lk/api/get-current-statistical");
                                                $prefecture_data =  json_decode($json_prefecture_data);

                                                // echo count($data->rows);

                                                if (count($prefecture_data->data->hospital_data)) {

                                                    foreach ($prefecture_data->data->hospital_data as $idx => $val) {
                                                        $hos_name = $val->hospital;
                                                        // Output a row
                                                        echo "<tr>";
                                                        echo "<td>$val->id</td>";
                                                        echo "<td>$hos_name->name<br>$hos_name->name_si</td>";
                                                        echo "<td>$val->cumulative_local</td>";
                                                        echo "<td>$val->cumulative_foreign</td>";
                                                        echo "<td>$val->treatment_local</td>";
                                                        echo "<td>$val->treatment_foreign</td>";
                                                        echo "<td>$val->cumulative_total</td>";
                                                        echo "<td>$val->treatment_total</td>";
                                                        echo "<td>$hos_name->updated_at</td>";
                                                        echo "</tr>";
                                                    }

                                                    // Close the table
                                                    // echo "</table>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- district data -->
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        District Data
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">

                                    <h4 class="header-title">District Data</h4>
                                    <p class="card-title-desc">Data Source <code><a href="https://hpb.health.gov.lk/en/api-documentation">https://hpb.health.gov.lk/en/api-documentation</a></code> API service.</p>

                                    <div class="table-responsive">
                                        <table class="table table-sm m-0">
                                            <thead>
                                                <tr>
                                                    <!-- <th>#</th> -->
                                                    <th>District</th>
                                                    <th>Cases</th>
                                                    <th>Recoverd</th>
                                                    <th>Deaths</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                //Prefecture Data- columns only
                                                $json_district_data = file_get_contents('https://morning-plateau-83796.herokuapp.com/api?id=1zIgPU0ZlYkiKaavYAUcHKgEP95jdaMaf9ljJgRqtog4&sheet=2&columns=false');
                                                $district_data = json_decode($json_district_data);

                                                // echo count($data->rows);

                                                if (count($district_data->rows)) {

                                                    foreach ($district_data->rows as $idx => $val) {
                                                        // $hos_name = $val->hospital;
                                                        // Output a row
                                                        echo "<tr>";
                                                        echo "<td>$val->prefecture</td>";
                                                        echo "<td>$val->cases</td>";
                                                        echo "<td>$val->recovered</td>";
                                                        echo "<td>$val->deaths</td>";
                                                        echo "</tr>";
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Daily increase -->
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Daily increase
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="container">
                                        <canvas id="myChart_incre"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


            <!-- <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            2019 © Apaxy.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                            </div>
                        </div>
                    </div>
                </div>
            </footer> -->
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <script src="assets/js/app.js"></script>

    <script src="assets/js/app.js"></script>

    <!-- giyhub cript -->
    <script src="assets_2/jquery.min.js"></script>
    <script src="assets_2/jquery.loading.min.js"></script>

    <script>
        const build_timestamp = '1584688743100';
    </script>
    <script src="lang.js?t=3194"></script>
    <script src="app.js?t=3194"></script>

    <script src="assets_2/bootstrap.bundle.min.js"></script>
    
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->

    <!-- <script src="assets/libs/chart.js/Chart.bundle.min.js"></script>
    <script src="assets/js/pages/chartjs.init.js"></script>

    <script src="assets/js/app.js"></script> -->

    <script src="./myChart.js"></script>


</body>

</html>