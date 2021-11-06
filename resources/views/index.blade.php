<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mahardika Ticket</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->
    <!-- Hero start -->
    <section class="hero">
        <div class="p-4 mb-0">
            <div class="container-fluid text-center">
                <h1 class="display-4 fw-bold text-black">Best Seller</h1>
                <div class="row pt-4">
                    <div class="col-md-4">
                        <div class="home-img text-center">
                            <img class="gambar" src="{{ asset('img/Rectangle7.jpg') }}" alt="profile img" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="home-img text-center">
                            <img class="gambar" src="{{ asset('img/Rectangle8.jpg') }}" alt="profile img" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="home-img text-center">
                            <img class="gambar" src="{{ asset('img/Rectangle9.jpg') }}" alt="profile img" />
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </section>
    <!-- Hero end -->
    <!-- Ticket start -->
    <section class="ticket px-4 py-5">
        <div class="container-fluid">
            <div class="col-md-12 mb-4">
                <div class="card mb-3 gambar">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('img/Rectangle7.jpg') }}" class="gambar" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="card-text">
                                            <h1>Nama Event</h1>
                                        </div>
                                        <div class="card-text">
                                            <h4>Senin 15-10-2021</h4>
                                        </div>
                                        <div class="card-text">
                                            <h3>17:00 - 20:00</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card-diskon">
                                            <h5>Rp. 500.000,-</h5>
                                        </div>
                                        <div class="card-harga">
                                            <h4>Rp. 700.000,-</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-4">
                <div class="card mb-3 gambar">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('img/Rectangle8.jpg') }}" class="gambar" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="card-text">
                                            <h1>Nama Event</h1>
                                        </div>
                                        <div class="card-text">
                                            <h4>Senin 15-10-2021</h4>
                                        </div>
                                        <div class="card-text">
                                            <h3>17:00 - 20:00</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card-diskon">
                                            <h5>Rp. 500.000,-</h5>
                                        </div>
                                        <div class="card-harga">
                                            <h4>Rp. 700.000,-</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mb-4">
                <div class="card mb-3 gambar">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('img/Rectangle9.jpg') }}" class="gambar" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="card-text">
                                            <h1>Nama Event</h1>
                                        </div>
                                        <div class="card-text">
                                            <h4>Senin 15-10-2021</h4>
                                        </div>
                                        <div class="card-text">
                                            <h3>17:00 - 20:00</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card-diskon">
                                            <h5>Rp. 500.000,-</h5>
                                        </div>
                                        <div class="card-harga">
                                            <h4>Rp. 700.000,-</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Ticket end -->
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
</body>
</html>