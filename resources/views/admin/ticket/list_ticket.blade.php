@extends('admin.layout_back')
@section('title')
    Data Ticket
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="float-sm-left">
                                    <h3 class="card-title mt-2 fw-bold">Data Ticket</h3>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-sm-right">
                                    <a href="{{ url('/admin/ticket/insert') }}" class="btn btn-success"><i class="fas fa-plus"></i>Tambah</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="" class="table table-bordered table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th class="col-1">No</th>
                                    <th>Gambar</th>
                                    <th>Nama Event</th>
                                    <th>Deskripsi</th>
                                    <th>Lokasi</th>
                                    <th>Tanggal Event</th>
                                    <th>Waktu</th>
                                    <th>Harga Tiket</th>
                                    <th>Stok</th>
                                    <th>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    if(empty($_GET['page']))
                                    $i=1;
                                    else
                                    $i=($_GET['page'] * $tickets->count()) - ($tickets->count()-1);
                                @endphp
                                @foreach ($tickets as $row)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td><img width="70px" src="{{url('storage/images/'.$row->gambar)}}"></td>
                                        <td>{{ $row->event->nm_event }}</td>
                                        <td>{{ $row->event->deskripsi }}</td>
                                        <td>{{ $row->event->lokasi }}</td>
                                        <td>{{ date('j F Y', strtotime($row->event->tgl_event)) }}</td>
                                        <td>{{ $row->event->jam_mulai }} - {{ $row->event->jam_selesai }}</td>
                                        <td>Rp. {{ number_format($row->harga) }}</td>
                                        <td>{{ $row->stok }}</td>
                                        <td>
                                            <a href="{{url('admin/ticket/edit/'.$row->id)}}" class="btn btn-sm btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{url('admin/ticket/delete/'.$row->id)}}" onclick="return confirm('Are you sure?')" ;><button type="button" class="btn btn-sm btn-danger fa fa-trash-alt"></button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection