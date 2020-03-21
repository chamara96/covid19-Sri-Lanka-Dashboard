<?php
function endKey($array)
{
    end($array);
    return key($array);
}
//Patient Data
// $json_patient_data = file_get_contents('https://morning-plateau-83796.herokuapp.com/api?id=1zIgPU0ZlYkiKaavYAUcHKgEP95jdaMaf9ljJgRqtog4&sheet=1');
// $patient_data = json_decode($json_patient_data, true);
//Prefecture Data
// $json_prefecture_data = file_get_contents('https://morning-plateau-83796.herokuapp.com/api?id=1zIgPU0ZlYkiKaavYAUcHKgEP95jdaMaf9ljJgRqtog4&sheet=2');
// $prefecture_data = json_decode($json_prefecture_data, true);


//Sum By Day
$json_sum_by_day = file_get_contents('https://morning-plateau-83796.herokuapp.com/api?id=1zIgPU0ZlYkiKaavYAUcHKgEP95jdaMaf9ljJgRqtog4&sheet=3');
$sum_by_day = json_decode($json_sum_by_day, true);
$last_row = endKey($sum_by_day["rows"]);


//Last Updated
// $json_last_update = file_get_contents('https://morning-plateau-83796.herokuapp.com/api?id=1zIgPU0ZlYkiKaavYAUcHKgEP95jdaMaf9ljJgRqtog4&sheet=4');
// $last_update = json_decode($json_last_update, true);
//Patient Statuses
// $json_patient_statuses = file_get_contents('https://morning-plateau-83796.herokuapp.com/api?id=1zIgPU0ZlYkiKaavYAUcHKgEP95jdaMaf9ljJgRqtog4&sheet=5');
// $patient_statuses = json_decode($json_patient_statuses, true);

$json_health_gov_lk = file_get_contents('http://hpb.health.gov.lk/api/get-current-statistical');
$health_gov_lk = json_decode($json_health_gov_lk, true);

//Globle stat
$global_new_cases = $health_gov_lk["data"]["global_new_cases"];
$global_total_cases    = $health_gov_lk["data"]["global_total_cases"];
$global_deaths    = $health_gov_lk["data"]["global_deaths"];
$global_new_deaths    = $health_gov_lk["data"]["global_new_deaths"];
$global_recovered = $health_gov_lk["data"]["global_recovered"];

$global_new_case_presentage = round($global_new_cases * 100 / $global_total_cases, 2);
$global_active_cases = $global_total_cases - $global_deaths - $global_recovered;

$global_new_deaths_presentage = round($global_new_deaths * 100 / $global_deaths, 2);
$global_deaths_presentage = round($global_deaths * 100 / $global_total_cases, 2);

$global_recovered_presentage = round($global_recovered * 100 / $global_total_cases);


//Main stats
$critical_case = $sum_by_day["rows"][$last_row]["critical"];
$deaths = $sum_by_day["rows"][$last_row]["deceased"];
$tested = $sum_by_day["rows"][$last_row]["tested"];
$confirmed_case = $sum_by_day["rows"][$last_row]["confirmed"];
$recovered = $sum_by_day["rows"][$last_row]["recovered"];

$active_case = $confirmed_case - $deaths - $recovered;
$increse_confirmed_case = $sum_by_day["rows"][$last_row]["confirmed"] - $sum_by_day["rows"][$last_row - 1]["confirmed"];
$increse_deaths = $sum_by_day["rows"][$last_row]["deceased"] - $sum_by_day["rows"][$last_row - 1]["deceased"];
$increse_recovered = $sum_by_day["rows"][$last_row]["recovered"] - $sum_by_day["rows"][$last_row - 1]["recovered"];
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>COVID - 19</title>
    <!--<meta http-equiv = "refresh" content = "2; url = https://covid19.chamaralabs.com/#tab=world-trends&continent=亚洲&country=斯里兰卡" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Realtime Corona Data Visualization" name="COVID-19 Sri Lanka Dashboard" />
    <meta content="chamaralabs.com" name="Chamara Madhushan" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon2.ico">

    <!-- slick css -->
    <link href="assets/libs/slick-slider/slick/slick.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/slick-slider/slick/slick-theme.css" rel="stylesheet" type="text/css" />

    <!-- jvectormap -->
    <link href="assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>



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
                                <h2 class="text-light">COVID-19</h2>
                                <h5 class="text-light">&nbsp;stay HOME stay SAFE</h5>
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
                    
                    <button type="button" class="btn btn-sm mr-2 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

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

        <div class="topnav">
            <div class="container-fluid">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-uielement" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-format-underline mr-2"></i>Region Tread <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-uielement">
                                    <a class="dropdown-item" href="#tab=world-trends&amp;continent=all">All countries</a>
                                    <a class="dropdown-item" href="#tab=world-trends&amp;continent=亚洲">Asia</a>
                                    <a class="dropdown-item" href="#tab=world-trends&amp;continent=欧洲">Europe</a>
                                    <a class="dropdown-item" href="#tab=world-trends&amp;continent=大洋洲">Oceania</a>
                                    <a class="dropdown-item" href="#tab=world-trends&amp;continent=北美洲">North America</a>
                                    <a class="dropdown-item" href="#tab=world-trends&amp;continent=南美洲">South America</a>
                                    <a class="dropdown-item" href="#tab=world-trends&amp;continent=非洲">Africa</a>
                                    <a class="dropdown-item" href="#tab=world-trends&amp;continent=其他">other</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-components" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-cloud-print-outline mr-2"></i>Analysis country <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-components">
                                    <a class="dropdown-item" href="#tab=countries-compare&amp;metrics=confirmed">Accumulated Confirmed Patients</a>
                                    <a class="dropdown-item" href="#tab=countries-compare&amp;metrics=exists">Number of Confirmed Diagnoses</a>
                                    <a class="dropdown-item" href="#tab=countries-compare&amp;metrics=increase">New Confirmed Patients</a>
                                    <a class="dropdown-item" href="#tab=countries-compare&amp;metrics=dead">Death toll</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-advancedui" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-package-variant-closed mr-2"></i>China Tread<div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-advancedui">
                                    <a class="dropdown-item" href="#tab=summary">Overall trend</a>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="slana.php" id="topnav-advancedui" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-package-variant-closed mr-2"></i>Sri Lanka Analysis<div class="arrow-down"></div>
                                </a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>


        </div>

        <nav style="display:none;" class="navbar navbar-expand-lg navbar-light bg-light mb-3">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto" id="navbar">
                    <li class="nav-item">
                        <a class="nav-link" href="#tab=world-map">World Map</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#tab=world-trends" id="continentDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Trends by country</a>
                        <div class="dropdown-menu" aria-labelledby="continentDropdown">
                            <a class="dropdown-item" href="#tab=world-trends&amp;continent=all">All countries</a>
                            <a class="dropdown-item" href="#tab=world-trends&amp;continent=亚洲">Asia</a>
                            <a class="dropdown-item" href="#tab=world-trends&amp;continent=欧洲">Europe</a>
                            <a class="dropdown-item" href="#tab=world-trends&amp;continent=大洋洲">Oceania</a>
                            <a class="dropdown-item" href="#tab=world-trends&amp;continent=北美洲">North America</a>
                            <a class="dropdown-item" href="#tab=world-trends&amp;continent=南美洲">South America</a>
                            <a class="dropdown-item" href="#tab=world-trends&amp;continent=非洲">Africa</a>
                            <a class="dropdown-item" href="#tab=world-trends&amp;continent=其他">other</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#tab=countries-compare" id="compareDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">国家对比</a>
                        <div class="dropdown-menu" aria-labelledby="compareDropdown">
                            <a class="dropdown-item" href="#tab=countries-compare&amp;metrics=confirmed">Accumulated confirmed patients</a>
                            <a class="dropdown-item" href="#tab=countries-compare&amp;metrics=exists">Number of confirmed diagnoses</a>
                            <a class="dropdown-item" href="#tab=countries-compare&amp;metrics=increase">New confirmed patients</a>
                            <a class="dropdown-item" href="#tab=countries-compare&amp;metrics=dead">death toll</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#tab=china-trends" id="chinaDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">China Trend</a>
                        <div class="dropdown-menu" aria-labelledby="chinaDropdown">
                            <a class="dropdown-item" href="#tab=summary">Overall trend</a>
                            <a class="dropdown-item" href="#tab=zerodays">New overview</a>
                            <a class="dropdown-item" href="#tab=trends">Province and city trends</a>
                            <a class="dropdown-item" href="#tab=map">Provinces and cities map</a>
                            <a class="dropdown-item" href="#tab=cities-map">All city maps</a>
                        </div>
                    </li>
                </ul>

            </div>

        </nav>

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
                                <h4 class="mb-0 font-size-18">Sri Lanka Dashboard</h4>
                                <p style="color:blue;font-size:11px;">Data Source - <a href="https://docs.google.com/spreadsheets/u/0/d/1zIgPU0ZlYkiKaavYAUcHKgEP95jdaMaf9ljJgRqtog4/htmlview#">Google Sheet</a></p>

                                <!-- <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Apaxy</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div> -->

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <!-- Sri Lanka Review -->
                    <div class="row">

                        <div class="col-sm-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <h5 class="font-size-14">Confirmed</h5>
                                        </div>
                                        <div class="avatar-xs">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="dripicons-box"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <h4 class="m-0 align-self-center"><?php echo $confirmed_case; ?></h4>
                                    <p class="mb-0 mt-3 text-muted"><span class="text-success"><?php echo round($increse_confirmed_case * 100 / $confirmed_case, 2); ?>% <i class="mdi mdi-trending-up mr-1"></i></span><?php echo $increse_confirmed_case; ?> New Cases </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <h5 class="font-size-14">Active Cases</h5>
                                        </div>
                                        <div class="avatar-xs">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="dripicons-briefcase"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <h4 class="m-0 align-self-center"><?php echo $active_case; ?></h4>
                                    <!-- <h5 class="m-0 align-self-center">Critical Cases - <?php echo $critical_case; ?></h5> -->

                                    <p class="mb-0 mt-3 text-muted">Critical Cases - <?php echo $critical_case; ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <h5 class="font-size-14">Recover</h5>
                                        </div>
                                        <div class="avatar-xs">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="dripicons-briefcase"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <h4 class="m-0 align-self-center"><?php echo $recovered; ?></h4>
                                    <p class="mb-0 mt-3 text-muted"><span class="text-success"><?php echo round($increse_recovered * 100 / $recovered, 2); ?>% <i class="mdi mdi-trending-up mr-1"></i></span> <?php echo $increse_recovered; ?> on Today </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="media-body">
                                            <h5 class="font-size-14">Death</h5>
                                        </div>
                                        <div class="avatar-xs">
                                            <span class="avatar-title rounded-circle bg-primary">
                                                <i class="dripicons-tags"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <h4 class="m-0 align-self-center"><?php echo $deaths; ?></h4>
                                    <p class="mb-0 mt-3 text-muted"><span class="text-danger">
                                            <!--4.35 % <i class="mdi mdi-trending-down mr-1"></i> --></span> From previous period</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->

                    <!-- Global Review -->
                    <div class="row">
                        <div class="col-xl-5">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4">Globle Review</h4>
                                    
                                    <p style="color:blue;font-size:11px;">Data Source - <a href="https://hpb.health.gov.lk/en/api-documentation">https://hpb.health.gov.lk/en/api-documentation</a></p>
                                    <p style="color:blue;font-size:11px;">Last Update <?php echo $health_gov_lk["data"]["update_date_time"]; ?> </p>

                                    <ul class="verti-timeline list-unstyled mb-0" data-simplebar style="max-height: 393px;">

                                        <li class="event-list">
                                            <div class="media">
                                                <!-- <div class="avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                        D
                                                    </span>
                                                </div> -->
                                                <div class="media-body">
                                                    <h5 class="font-size-14 mb-1">Global Active Cases</h5>
                                                    <p class="text-muted mb-0 font-size-24"><?php echo $global_active_cases; ?></p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="event-list">
                                            <div class="media">
                                                <!-- <div class="avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                        R
                                                    </span>
                                                </div> -->
                                                <div class="media-body">
                                                    <h5 class="font-size-14 mb-1">Total Confirmed</h5>
                                                    <p class="text-muted mb-0 font-size-24"><?php echo $global_total_cases; ?></p>
                                                    <p class="text-muted mb-0 font-size-16">New Cases +<?php echo $global_new_cases . " (" . $global_new_case_presentage . "%)"; ?></p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="event-list">
                                            <div class="media">
                                                <!-- <div class="avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                        M
                                                    </span>
                                                </div> -->
                                                <div class="media-body">
                                                    <h5 class="font-size-14 mb-1">Total Deaths</h5>
                                                    <p class="text-muted mb-0 font-size-24"><?php echo $global_deaths . "(+" . $global_deaths_presentage . "%)"; ?></p>
                                                    <p class="text-muted mb-0 font-size-16">New Deaths +<?php echo $global_new_deaths . " (+" . $global_new_deaths_presentage . "%)"; ?></p>
                                                    <!-- <p class="text-muted mb-0 font-size-16">Deaths +<?php echo "(+" . $global_deaths_presentage . "%)"; ?></p> -->
                                                </div>
                                            </div>
                                        </li>
                                        <li class="event-list">
                                            <div class="media">
                                                <!-- <div class="avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                        J
                                                    </span>
                                                </div> -->
                                                <div class="media-body">
                                                    <h5 class="font-size-14 mb-1">Total Recover</h5>
                                                    <p class="text-muted mb-0 font-size-24"><?php echo $global_recovered; ?></p>
                                                    <p class="text-muted mb-0 font-size-16">Recovered +<?php echo "(+" . $global_recovered_presentage . "%)"; ?></p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="col-xl-5">
                            <img src="assets/images/corona-01.png" alt="">
                        </div> -->
                    </div>

                    <!--<button type="button" class="btn btn-dark"><a class="text-light" href="#tab=world-map">World Map</a></button>-->
                    <button type="button" class="btn btn-dark"><a class="text-light" href="#tab=world-map">World Map</a></button>
                    <button type="button" class="btn btn-dark"><a class="text-light" href="#tab=world-trends&continent=亚洲&country=斯里兰卡">Sri Lanka</a></button>
                    <button type="button" class="btn btn-dark"><a class="text-light" href="#tab=world-trends&continent=欧洲&country=意大利">Italy</a></button>

                    <!-- world -->
                    <!-- <div class="row">
                        <iframe src="http://localhost/corona123/COVID-19-Charts-master/public/index2.html" frameborder="0" scrolling="no" onload='resizeIframe(this)' width="100%"></iframe>
                    </div> -->


                    <!-- Graph -->
                    <!-- <div class="row">

                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4">Sales Analytics</h4>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-4">
                                            <div class="text-center">
                                                <p>This Month</p>
                                                <h4>$ 46,543</h4>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="text-center">
                                                <p>This Week</p>
                                                <h4>$ 7,842</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="revenue-chart" class="apex-charts" dir="ltr"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4">Marketplaces Earning</h4>

                                    <div dir="ltr">

                                        <div class="slick-slider slider-for hori-timeline-desc pt-0">
                                            <div>
                                                <p class="font-size-16">Daily Earning</p>
                                                <h4 class="mb-4">$ 1,452</h4>
                                                <div id="earning-day-chart" class="apex-charts"></div>
                                            </div>
                                            <div>
                                                <p class="font-size-16">Weekly Earning</p>
                                                <h4 class="mb-4">$ 6,536</h4>
                                                <div id="earning-weekly-chart" class="apex-charts"></div>
                                            </div>
                                            <div>
                                                <p class="font-size-16">Monthly Earning</p>
                                                <h4 class="mb-4">$ 24,562</h4>
                                                <div id="earning-monthly-chart" class="apex-charts"></div>
                                            </div>
                                            <div>
                                                <p class="font-size-16">Yearly Earning</p>
                                                <h4 class="mb-4">$ 2,82,562</h4>
                                                <div id="earning-yearly-chart" class="apex-charts"></div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center mb-3">
                                            <div class="col-lg-11">
                                                <div class="slick-slider slider-nav hori-timeline-nav">
                                                    <div class="slider-nav-item">
                                                        <h5 class="nav-title font-size-14 mb-0">Day</h5>
                                                    </div>
                                                    <div class="slider-nav-item">
                                                        <h5 class="nav-title font-size-14 mb-0">Week</h5>
                                                    </div>
                                                    <div class="slider-nav-item">
                                                        <h5 class="nav-title font-size-14 mb-0">Month</h5>
                                                    </div>
                                                    <div class="slider-nav-item">
                                                        <h5 class="nav-title font-size-14 mb-0">Year</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- end row -->

                    <!-- <div class="row">
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Social Source</h4>
                                    <div id="social-source-chart" class="apex-charts" dir="ltr"></div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="text-center mt-2">
                                                <i class="mdi mdi-facebook h2 text-primary"></i>

                                                <p class="mt-3 mb-2">Facebook</p>
                                                <h5>1245</h5>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="text-center mt-2">
                                                <i class="mdi mdi-twitter h2 text-info"></i>

                                                <p class="mt-3 mb-2">Twitter</p>
                                                <h5>852</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4">Clients Review</h4>

                                    <ul class="verti-timeline list-unstyled mb-0" data-simplebar style="max-height: 393px;">
                                        <li class="event-list">
                                            <div class="media">
                                                <div class="avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                        D
                                                    </span>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="font-size-14 mb-1">Danny Campbell</h5>
                                                    <p class="text-muted mb-0 font-size-13">To an English person, it will seem like simplified.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="event-list">
                                            <div class="media">
                                                <div class="avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                        R
                                                    </span>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="font-size-14 mb-1">Ralph Merkel</h5>
                                                    <p class="text-muted mb-0 font-size-13">At solmen va esser necessi far sommun paroles.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="event-list">
                                            <div class="media">
                                                <div class="avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                        M
                                                    </span>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="font-size-14 mb-1">Marcus Smith</h5>
                                                    <p class="text-muted mb-0 font-size-13">Everyone realizes why a new common language.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="event-list">
                                            <div class="media">
                                                <div class="avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                        J
                                                    </span>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="font-size-14 mb-1">James Denson</h5>
                                                    <p class="text-muted mb-0 font-size-13">For science, music, sport, etc, europe vocabulary.</p>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="event-list">
                                            <div class="media">
                                                <div class="avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                        D
                                                    </span>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="font-size-14 mb-1">Danny Campbell</h5>
                                                    <p class="text-muted mb-0 font-size-13">To an English person, it will seem like simplified.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="event-list">
                                            <div class="media">
                                                <div class="avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                        R
                                                    </span>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="font-size-14 mb-1">Ralph Merkel</h5>
                                                    <p class="text-muted mb-0 font-size-13">At solmen va esser necessi far sommun paroles.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="event-list">
                                            <div class="media">
                                                <div class="avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                        M
                                                    </span>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="font-size-14 mb-1">Marcus Smith</h5>
                                                    <p class="text-muted mb-0 font-size-13">Everyone realizes why a new common language.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="event-list">
                                            <div class="media">
                                                <div class="avatar-xs mr-3">
                                                    <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                        J
                                                    </span>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="font-size-14 mb-1">James Denson</h5>
                                                    <p class="text-muted mb-0 font-size-13">For science, music, sport, etc, europe vocabulary.</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4">Revenue by Location</h4>
                                    <div id="usa" style="height: 200px"></div>

                                    <div class="mt-5">
                                        <div class="position-relative">
                                            <div class="progress-label text-primary border-primary mb-2">California</div>
                                            <div class="progress progress-sm progress-animate mb-4">
                                                <div class="progress-bar" role="progressbar" style="width: 86%" aria-valuenow="86" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-value">
                                                        <h5 class="mb-1 text-dark font-size-14">86%</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="position-relative">
                                            <div class="progress-label text-primary border-primary mb-2">Montana</div>
                                            <div class="progress progress-sm progress-animate mb-4">
                                                <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100">
                                                    <div class="progress-value">
                                                        <h5 class="mb-1 text-dark font-size-14">72%</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <a href="#" class="btn btn-primary btn-sm">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- end row -->


                    <!-- <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title mb-4">Latest Transaction</h4>

                                    <div class="table-responsive">
                                        <table class="table table-centered table-nowrap mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width: 50px;">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheckall">
                                                            <label class="custom-control-label" for="customCheckall"></label>
                                                        </div>
                                                    </th>
                                                    <th scope="col" style="width: 60px;"></th>
                                                    <th scope="col">ID & Name</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                            <label class="custom-control-label" for="customCheck1"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img src="assets/images/users/avatar-2.jpg" alt="user" class="avatar-xs rounded-circle" />
                                                    </td>
                                                    <td>
                                                        <p class="mb-1 font-size-12">#AP1234</p>
                                                        <h5 class="font-size-15 mb-0">David Wiley</h5>
                                                    </td>
                                                    <td>02 Nov, 2019</td>
                                                    <td>$ 1,234</td>
                                                    <td>1</td>

                                                    <td>
                                                        $ 1,234
                                                    </td>
                                                    <td>
                                                        <i class="mdi mdi-checkbox-blank-circle text-success mr-1"></i> Confirm
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-outline-success btn-sm">Edit</button>
                                                        <button type="button" class="btn btn-outline-danger btn-sm">Cancel</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                            <label class="custom-control-label" for="customCheck2"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                W
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="mb-1 font-size-12">#AP1235</p>
                                                        <h5 class="font-size-15 mb-0">Walter Jones</h5>
                                                    </td>
                                                    <td>04 Nov, 2019</td>
                                                    <td>$ 822</td>
                                                    <td>2</td>

                                                    <td>
                                                        $ 1,644
                                                    </td>
                                                    <td>
                                                        <i class="mdi mdi-checkbox-blank-circle text-success mr-1"></i> Confirm
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-outline-success btn-sm">Edit</button>
                                                        <button type="button" class="btn btn-outline-danger btn-sm">Cancel</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                            <label class="custom-control-label" for="customCheck3"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img src="assets/images/users/avatar-3.jpg" alt="user" class="avatar-xs rounded-circle" />
                                                    </td>
                                                    <td>
                                                        <p class="mb-1 font-size-12">#AP1236</p>
                                                        <h5 class="font-size-15 mb-0">Eric Ryder</h5>
                                                    </td>
                                                    <td>05 Nov, 2019</td>
                                                    <td>$ 1,153</td>
                                                    <td>1</td>

                                                    <td>
                                                        $ 1,153
                                                    </td>
                                                    <td>
                                                        <i class="mdi mdi-checkbox-blank-circle text-danger mr-1"></i> Cancel
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-outline-success btn-sm">Edit</button>
                                                        <button type="button" class="btn btn-outline-danger btn-sm">Cancel</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                            <label class="custom-control-label" for="customCheck4"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <img src="assets/images/users/avatar-6.jpg" alt="user" class="avatar-xs rounded-circle" />
                                                    </td>
                                                    <td>
                                                        <p class="mb-1 font-size-12">#AP1237</p>
                                                        <h5 class="font-size-15 mb-0">Kenneth Jackson</h5>
                                                    </td>
                                                    <td>06 Nov, 2019</td>
                                                    <td>$ 1,365</td>
                                                    <td>1</td>

                                                    <td>
                                                        $ 1,365
                                                    </td>
                                                    <td>
                                                        <i class="mdi mdi-checkbox-blank-circle text-success mr-1"></i> Confirm
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-outline-success btn-sm">Edit</button>
                                                        <button type="button" class="btn btn-outline-danger btn-sm">Cancel</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck5">
                                                            <label class="custom-control-label" for="customCheck5"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="avatar-xs">
                                                            <span class="avatar-title rounded-circle bg-soft-primary text-primary">
                                                                R
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="mb-1 font-size-12">#AP1238</p>
                                                        <h5 class="font-size-15 mb-0">Ronnie Spiller</h5>
                                                    </td>
                                                    <td>08 Nov, 2019</td>
                                                    <td>$ 740</td>
                                                    <td>2</td>

                                                    <td>
                                                        $ 1,480
                                                    </td>
                                                    <td>
                                                        <i class="mdi mdi-checkbox-blank-circle text-warning mr-1"></i> Pending
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-outline-success btn-sm">Edit</button>
                                                        <button type="button" class="btn btn-outline-danger btn-sm">Cancel</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- end row -->

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

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-tabs-custom rightbar-nav-tab nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link py-3 active" data-toggle="tab" href="#chat-tab" role="tab">
                        <i class="mdi mdi-message-text font-size-22"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-3" data-toggle="tab" href="#tasks-tab" role="tab">
                        <i class="mdi mdi-format-list-checkbox font-size-22"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-3" data-toggle="tab" href="#settings-tab" role="tab">
                        <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                        <i class="mdi mdi-settings font-size-22"></i>
                    </a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content text-muted">
                <div class="tab-pane active" id="chat-tab" role="tabpanel">

                    <form class="search-bar py-4 px-3">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="mdi mdi-magnify"></span>
                        </div>
                    </form>

                    <h6 class="font-weight-medium px-4 mt-2 text-uppercase">Group Chats</h6>

                    <div class="p-2">
                        <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                            <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-success"></i>
                            <span class="mb-0 mt-1">App Development</span>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                            <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-warning"></i>
                            <span class="mb-0 mt-1">Office Work</span>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item pl-3 mb-2 d-block">
                            <i class="mdi mdi-checkbox-blank-circle-outline mr-1 text-danger"></i>
                            <span class="mb-0 mt-1">Personal Group</span>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item pl-3 d-block">
                            <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>
                            <span class="mb-0 mt-1">Freelance</span>
                        </a>
                    </div>

                    <h6 class="font-weight-medium px-4 mt-4 text-uppercase">Favourites</h6>

                    <div class="p-2">
                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative mr-3">
                                    <img src="assets/images/users/avatar-10.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status online"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Andrew Mackie</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">It will seem like simplified English.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative mr-3">
                                    <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status away"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Rory Dalyell</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">To an English person, it will seem like simplified</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative mr-3">
                                    <img src="assets/images/users/avatar-9.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status busy"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Jaxon Dunhill</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">To achieve this, it would be necessary.</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <h6 class="font-weight-medium px-4 mt-4 text-uppercase">Other Chats</h6>

                    <div class="p-2 pb-4">
                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative mr-3">
                                    <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status online"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Jackson Therry</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">Everyone realizes why a new common language.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative mr-3">
                                    <img src="assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status away"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Charles Deakin</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">The languages only differ in their grammar.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative mr-3">
                                    <img src="assets/images/users/avatar-5.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status online"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Ryan Salting</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">If several languages coalesce the grammar of the resulting.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative mr-3">
                                    <img src="assets/images/users/avatar-6.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status online"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Sean Howse</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">It will seem like simplified English.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative mr-3">
                                    <img src="assets/images/users/avatar-7.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status busy"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Dean Coward</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">The new common language will be more simple.</p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset notification-item">
                            <div class="media">
                                <div class="position-relative mr-3">
                                    <img src="assets/images/users/avatar-8.jpg" class="rounded-circle avatar-xs" alt="user-pic">
                                    <i class="mdi mdi-circle user-status away"></i>
                                </div>
                                <div class="media-body overflow-hidden">
                                    <h6 class="mt-0 mb-1">Hayley East</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-0 text-truncate">One could refuse to pay expensive translators.</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>

                <div class="tab-pane" id="tasks-tab" role="tabpanel">
                    <h6 class="font-weight-medium px-3 mb-0 mt-4">Working Tasks</h6>

                    <div class="p-2">
                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                            <p class="text-muted mb-0">App Development<span class="float-right">75%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                            <p class="text-muted mb-0">Database Repair<span class="float-right">37%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 37%" aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                            <p class="text-muted mb-0">Backup Create<span class="float-right">52%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 52%" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>
                    </div>

                    <h6 class="font-weight-medium px-3 mb-0 mt-4">Upcoming Tasks</h6>

                    <div class="p-2">
                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                            <p class="text-muted mb-0">Sales Reporting<span class="float-right">12%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 12%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                            <p class="text-muted mb-0">Redesign Website<span class="float-right">67%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>

                        <a href="javascript: void(0);" class="text-reset item-hovered d-block p-3">
                            <p class="text-muted mb-0">New Admin Design<span class="float-right">84%</span></p>
                            <div class="progress mt-2" style="height: 4px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 84%" aria-valuenow="84" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </a>
                    </div>

                    <div class="p-3 mt-2">
                        <a href="javascript: void(0);" class="btn btn-success btn-block waves-effect waves-light">Create Task</a>
                    </div>

                </div>
                <div class="tab-pane" id="settings-tab" role="tabpanel">
                    <h6 class="font-weight-medium px-4 py-3 text-uppercase bg-light">General Settings</h6>

                    <div class="p-4">
                        <h6 class="font-weight-medium">Online Status</h6>
                        <div class="custom-control custom-switch mb-1">
                            <input type="checkbox" class="custom-control-input" id="settings-check1" name="settings-check1" checked="">
                            <label class="custom-control-label font-weight-normal" for="settings-check1">Show your status to all</label>
                        </div>

                        <h6 class="font-weight-medium mt-4">Auto Updates</h6>
                        <div class="custom-control custom-switch mb-1">
                            <input type="checkbox" class="custom-control-input" id="settings-check2" name="settings-check2" checked="">
                            <label class="custom-control-label font-weight-normal" for="settings-check2">Keep up to date</label>
                        </div>

                        <h6 class="font-weight-medium mt-4">Backup Setup</h6>
                        <div class="custom-control custom-switch mb-1">
                            <input type="checkbox" class="custom-control-input" id="settings-check3" name="settings-check3">
                            <label class="custom-control-label font-weight-normal" for="settings-check3">Auto backup</label>
                        </div>

                    </div>

                    <h6 class="font-weight-medium px-4 py-3 mt-2 text-uppercase bg-light">Advanced Settings</h6>

                    <div class="p-4">
                        <h6 class="font-weight-medium">Application Alerts</h6>
                        <div class="custom-control custom-switch mb-1">
                            <input type="checkbox" class="custom-control-input" id="settings-check4" name="settings-check4" checked="">
                            <label class="custom-control-label font-weight-normal" for="settings-check4">Email Notifications</label>
                        </div>

                        <div class="custom-control custom-switch mb-1">
                            <input type="checkbox" class="custom-control-input" id="settings-check5" name="settings-check5">
                            <label class="custom-control-label font-weight-normal" for="settings-check5">SMS Notifications</label>
                        </div>

                        <h6 class="font-weight-medium mt-4">API</h6>
                        <div class="custom-control custom-switch mb-1">
                            <input type="checkbox" class="custom-control-input" id="settings-check6" name="settings-check6">
                            <label class="custom-control-label font-weight-normal" for="settings-check6">Enable access</label>
                        </div>

                    </div>
                </div>
            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <div class="container-fluid" id="chart_container">
        Loading...
    </div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <!-- apexcharts -->
    <!-- <script src="assets/libs/apexcharts/apexcharts.min.js"></script> -->

    <!-- <script src="assets/libs/slick-slider/slick/slick.min.js"></script> -->

    <!-- Jq vector map -->
    <!-- <script src="assets/libs/jqvmap/jquery.vmap.min.js"></script> -->
    <!-- <script src="assets/libs/jqvmap/maps/jquery.vmap.usa.js"></script> -->

    <!-- <script src="assets/js/pages/dashboard.init.js"></script> -->

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
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-158038850-1');
    </script>
    <!-- ===================== -->

</body>

</html>