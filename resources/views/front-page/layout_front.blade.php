<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mahardika Ticket | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <!-- Navbar start -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white h-75">
        <div class="container-fluid mx-4">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/Rectangle13.jpg') }}" alt="" width="30" height="24" class="d-inline-block align-text-top">
                Mahardika Ticket
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#">About Us</a>
                    <a class="nav-link" href="#">Contact</a>
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->
    <!-- Content start -->
    @yield('content')
    <!-- Content end -->
    <!-- Footer start -->
    <footer class="bg-light mx-4 py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <img src="{{ asset('img/Rectangle13.jpg') }}" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    Mahardika Ticket
                </div>
                <div class="col-md-3">
                    <div class="copyright text-end">
                        <p class="text-footer">&copy;PT. Mahardika Solusi Teknologi.</p>
                        <p class="text-footer">We love our users!</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer end -->

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sweetalert/dist/sweetalert2.all.min.js') }}"></script>
    @if(session('message'))
    <script>
        Swal.fire("{{ session('message') }}");
    </script>
    @endif
    @stack('scrips')
</body>
</html>