<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">



    <link href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        class="bi bi-bootstrap-fill" viewBox="0 0 16 16">
        <path
            d="M6.375 7.125V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375v2.725z" />
        <path
            d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4h-8zm1.06 12V3.545h3.399c1.587 0 2.543.809 2.543 2.11 0 .884-.65 1.675-1.483 1.816v.1c1.143.117 1.904.931 1.904 2.033 0 1.488-1.084 2.396-2.888 2.396H5.062z" />
    </svg>


</head>

<body>

    <!--Header-->
    <header id="header" class="header fixed-top d-flex align-items-center bg-info text-black">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Rent My Vehicle</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('frontend/images/yogeshg.jpg') }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item d-flex align-items-center" type="submit">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span>
                                </button>
                            </form>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar bg-info text-black">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="/admin">
                    <i class="bx bxs-dashboard" style="font-size:30px;"></i>

                    <span>Dashboard</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#vehicle-nav" data-bs-toggle="collapse" href="#">
                    <i class="bx bx-car" style="font-size:30px;"> <i class="bx bx-cycling"
                            style="font-size:30px;"></i></i><span>Vehicle</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="vehicle-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/admin/car">
                            <i class="bx bx-car" style="font-size:20px;"></i><span>Add Car</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/bike">
                            <i class="bx bx-cycling" style="font-size:20px;"></i><span>Add Bike</span>

                        </a>
                    </li>

                </ul>
            </li>
            {{-- @can('admin') --}}
            <li class="nav-item">

                <a class="nav-link " href="{{ route('user.index') }}">

                    <i class='bx bx-user-circle' style="font-size:30px;"></i>
                    <span>Users</span>
                </a>
            </li>

            {{-- @endcan --}}
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#register-nav" data-bs-toggle="collapse"
                    href="#">
                    <i class="bx bxs-user-plus" style="font-size:30px;"></i><span>Register User</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="register-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/admin/customer">
                            <i class="bx bx-user" style="font-size:20px;"></i><span>Add Customer User</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/renter">
                            <i class="bx bxs-user" style="font-size:20px;"></i><span>Add Renter User</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="/admin/offer">
                    <i class='bx bxs-offer' style="font-size:30px;"></i>
                    <span>Offer</span>

                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#register-nav" data-bs-toggle="collapse"
                    href="#">
                    <i class="bi bi-bootstrap-fill" style="font-size:30px;"></i><span>Manage Booking</span><i
                        class="bi bi-chevron-down ms-auto"></i>

                </a>
                <ul id="register-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/admin/nbooking">
                            <i class="" style="font-size:20px;"></i><span>New Booking</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/cobooking">
                            <i class="" style="font-size:20px;"></i><span>Confirm Booking</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/cbooking">
                            <i class="" style="font-size:20px;"></i><span>Cancel Booking</span>
                        </a>
                    </li>
            </li>


        </ul>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#register-nav" data-bs-toggle="collapse" href="#">
                <i class="" style="font-size:30px;"></i><span>Rent</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="register-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/admin/nrent">
                        <i class="" style="font-size:20px;"></i><span>New rent</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/corent">
                        <i class="" style="font-size:20px;"></i><span>Confirm rent</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/crent">
                        <i class="" style="font-size:20px;"></i><span>Cancel rent</span>
                    </a>
                </li>
        </li>
        </ul>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.message.index') }}">
                <i class='bx bxl-messenger' style="font-size:30px;"></i>


                <span>view message</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.testimonial.index') }}">
                <i class='bx bxs-message-rounded-dots' style="font-size:30px;"></i>


                <span>view Testimonial</span>
            </a>
        </li>


        <li>
            <form id="nav-item" action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="nav-link" type="submit">
                    <i class="bx bx-log-out"></i>

                    <span>Logout Out</span>
                </button>
            </form>
        </li>
        {{-- @can('admin')
              <li class="nav-item">
                <a class="nav-link " href="{{ route('user.index') }}">
                    <i class="bi bi-grid">User</i>
                    <span></span>
                </a>
            </li> --}}
        {{-- @endcan --}}


        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">


        @yield('body-content')

    </main>

    <!-- Footer-->
    <footer id="footer" class="footer">
        <div class="copyright">
            Copyright &copy; 2023 Rent My Vehicle
        </div>
        <div class="credits">

            <a href=""></a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <script src="{{ asset('backend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('backend/assets/js/main.js') }}"></script>

</body>

</html>
