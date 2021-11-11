@extends('front-page.layout_front')
@section('title')
    Home
@endsection
@section('content')
<section class="hero">
    <div class="p-4 mb-0">
        <div class="container-fluid text-center">
            <h1 class="display-4 fw-bold text-black">Best Seller</h1>
            <div class="row pt-4">
                <div class="col-md-4 mb-3">
                    <div class="home-img text-center">
                        <img class="gambar" src="{{ asset('img/Rectangle10.jpg') }}" alt="profile img" />
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="home-img text-center">
                        <img class="gambar" src="{{ asset('img/Rectangle13.jpg') }}" alt="profile img" />
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="home-img text-center">
                        <img class="gambar" src="{{ asset('img/Rectangle14.jpg') }}" alt="profile img" />
                    </div>
                </div>                    
            </div>
        </div>
    </div>
</section>
<section class="ticket px-4 py-5">
    <div class="container-fluid">
        @foreach ($tickets as $tic)
        <div class="col-md-12 mb-4">
            <div class="card mb-3 gambar">
                <div class="row g-0">
                    <div class="col-md-4">
                        <a href="{{ url('ticket/'.$tic->event->slug) }}">
                            <img src="{{ url('storage/images/'.$tic->gambar) }}" class="gambar" alt="...">
                        </a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="card-text">
                                        <h1>{{ $tic->event->nm_event }}</h1>
                                    </div>
                                    <div class="card-text">
                                        <h4>{{ date('l, j F Y', strtotime($tic->event->tgl_event)) }}</h4>
                                    </div>
                                    <div class="card-text">
                                        <h3>{{ $tic->event->jam_mulai }} - {{ $tic->event->jam_selesai }}</h3>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card-harga">
                                        <h5><s>Rp. {{ number_format($tic->harga) }},-</s></h5>
                                    </div>
                                    <div class="card-diskon">
                                        <h4>Rp. 700.000,-</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        {{ $tickets->links() }}
    </div>
</section>
@endsection