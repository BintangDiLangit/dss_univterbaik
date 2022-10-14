<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body class="g-sidenav-show  bg-gray-100">
    @include('layouts.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                @include('layouts.navbar')
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            @yield('content')
            @include('layouts.footer')
        </div>
    </main>
    @include('layouts.fixed_plugin')
    <!--   Core JS Files   -->
    @include('layouts.script')
</body>

</html>
