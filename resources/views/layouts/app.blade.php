<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="/images/jbt.png" type="image/x-icon" />
    <title>Dashboard</title>
    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="/css/main/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/lineicons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="/js/highchart/code/highcharts.js"></script>
    <script src="/js/highchart/code/highcharts-more.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
        integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.min.js"></script>
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script> --}}
    <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/stock/modules/export-data.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    {{-- <script src="sweetalert2.all.min.js"></script> --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    @vite(['resources/sass/app.scss', 'resources/css/dashboard.css', 'resources/css/main.css', 'resources/js/main.js', 'resources/js/app.js', 'resources/js/api.js']) <!-- Styles -->
</head>

<body class="">

    <!-- ======== sidebar-nav start =========== -->
    <aside class="sidebar-nav-wrapper overflow-hidden aside">
        <div class="navbar-logo">
            <a href="{{ url('/') }}  ">
                <img src="/image/bali.png" alt="logo" class="img-fluid " width="100" />
            </a>
        </div>
        <nav class="sidebar-nav">
            <ul class="navMenus">
                <li class="nav-item ">
                    <a href="{{ url('/dashboard') }}" class="active text-main">
                        <span class="icon">
                            <i class="fa-sharp fa-solid fa-gauge"></i>
                        </span>
                        Dashboard
                    </a>
                </li>
            </ul>
            <ul class="navMenus">
                <li class="nav-item ">
                    <a href="{{ url('/dashboard/responden') }}" class="active text-main">
                        <span class="icon">
                            <i class="fa-sharp fa-solid fa-gauge"></i>
                        </span>
                        Responden
                    </a>
                </li>
            </ul>
            <ul class="navMenus">
                <li class="nav-item ">
                    <a href="{{ url('/dashboard/question') }}" class="active text-main">
                        <span class="icon">
                            <i class="fa-sharp fa-solid fa-gauge"></i>
                        </span>
                        Pertanyaan
                    </a>
                </li>
            </ul>
            <ul class="navMenus">
                <li class="nav-item ">
                    <a href="{{ url('/dashboard/layanan') }}" class="active text-main">
                        <span class="icon">
                            <i class="fa-sharp fa-solid fa-gauge"></i>
                        </span>
                        Layanan
                    </a>
                </li>
            </ul>
        </nav>

    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper mainside">
        <!-- ========== header start ========== -->
        <header class="header ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6 ">
                        <div class="header-left d-flex align-items-center">
                            <div class="menu-toggle-btn mr-20">
                                <button id="menu-toggle" class="main-btn primary-btn btn-hover menuBtn">
                                    <i class="lni lni-chevron-left me-2"></i> Menu
                                </button>

                                <!-- <img src="/images/jbt.png" alt="logo" class="img-fluid" style="width:10%" /> -->

                            </div>

                        </div>
                        {{-- <div class="action mr-10 text-white">
                            <p >ANEMOMETER JALAN TOL BALI MANDARA BERBASIS IOT</p>
                            <p >PT. JASAMARGA BALI TOL</p>
                            <p id="clock">
                            </p>
                        </div> --}}
                    </div>

                    <div class="col-6 ">
                        <div class="header-right">
                            {{-- <button onclick="openFullscreen();" class="btn btn-lg bg-white"><i
                                    class="fa fa-expand"></i></button> --}}
                            <div class="profile-box ml-15">
                                <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="profile-info">
                                        <div class="info">

                                            <h6 class="text-white">{{ session('nama') }}</h6>
                                            <div class="image">
                                                <img src="/images/profile/profile-image.png" alt="" />
                                                <span class="status"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <i class="lni lni-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">

                                    <li>
                                        <a href="{{ url('/signout') }}"> <i class="lni lni-exit"></i> Sign
                                            Out </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- profile end -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== header end ========== -->
        <!-- ========== section start ========== -->
        <section class="section py-5 d-flex flex-column min-vh-100">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- ========== section end ========== -->
        </section>
        <!-- ========== footer start =========== -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 order-last order-md-first">
                        <div class="copyright text-center text-md-start">
                            <p class="text-sm">
                                Developed by
                                <a href="" rel="nofollow" target="_blank">
                                    Dalsfindo

                                </a>
                            </p>
                        </div>
                    </div>
                    <!-- end col-->
                    <div class="col-md-6">
                        <div
                            class="
                  terms
                  d-flex
                  justify-content-center justify-content-md-end
                ">
                            <p href="#0" class="text-sm ml-15"><i class="fa fa-copyright"></i>
                                <?= date('Y') . ' v1.2' ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </main>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
    integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" type="text/css"
    href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
{{-- <script src="/js/moment.min.js"></script> --}}
{{-- <script src="/js/main.js"></script> --}}
