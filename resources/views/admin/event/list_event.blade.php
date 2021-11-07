@extends('admin.layout_back')
@section('title')
    Data Event
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="float-sm-left">
                                    <h3 class="card-title mt-2 fw-bold">Data Event</h3>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-sm-right">
                                    <a href="{{ url('admin/event/insert') }}" class="btn btn-success"><i class="fas fa-plus"></i>Tambah</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example_2" class="table table-bordered table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th class="col-sm-1">No</th>
                                    <th>Nama Event</th>
                                    <th>Slug</th>
                                    <th>Tanggal Event</th>
                                    <th>Jam</th>
                                    <th>Lokasi</th>
                                    <th>Deskripsi</th>
                                    <th>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    if(empty($_GET['page']))
                                    $i=1;
                                    else
                                    $i=($_GET['page'] * $events->count()) - ($events->count()-1);
                                @endphp
                                @foreach ($events as $row)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $row->nm_event }}</td>
                                        <td>{{ $row->slug }}</td>
                                        <td>{{ date('j F Y', strtotime($row->tgl_event)) }}</td>
                                        <td>{{ $row->jam_mulai }} - {{ $row->jam_selesai }}</td>
                                        <td>{{ $row->lokasi }}</td>
                                        <td>{{ $row->deskripsi }}</td>
                                        <td>
                                            <a href="{{url('admin/event/edit/'.$row->id)}}" class="btn btn-sm btn-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{url('admin/event/delete/'.$row->id)}}" onclick="return confirm('Are you sure?')" ;><button type="button" class="btn btn-sm btn-danger fa fa-trash-alt"></button></a>
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