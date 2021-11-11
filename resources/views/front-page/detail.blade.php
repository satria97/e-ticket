@extends('front-page.layout_front')
@section('title')
    Detail
@endsection
@section('content')
<section class="ticket px-4 py-5">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card gambar">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ url('storage/images/'.$tickets->gambar) }}" class="card-img-top gambar" alt="...">
                    </div>
                    <div class="col-md-12 p-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 px-5 mb-3">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="card-text">
                                                <h1 class="text-info">{{ $tickets->nm_event }}</h1>
                                            </div>
                                            <div class="card-text">
                                                <h4>Senin 15-10-2021</h4>
                                            </div>
                                            <div class="card-text">
                                                <h3>{{ $tickets->jam_mulai }} - {{ $tickets->jam_selesai }}</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="card-harga">
                                                <h5>Rp. {{ number_format($tickets->harga) }},-</h5>
                                            </div>
                                            <div class="card-diskon">
                                                <h1>Rp. 700.000,-</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card-text line-height-2">
                                        <p class="fw-bold fs-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Velit quis nulla similique totam eaque doloremque recusandae corporis aliquam quo possimus. Ab ipsam quasi mollitia nam, eaque asperiores repudiandae aperiam in?</p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="float-end">
                                        <form action="{{ url('/ticket/booking-proses') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="ticket_id" value="{{ $tickets->id }}">
                                            <input type="hidden" name="qty" value="1">
                                            <button type="submit" class="btn btn-success">Booking Ticket</button>
                                        </form>
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
@endsection