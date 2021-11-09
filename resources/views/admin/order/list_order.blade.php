@extends('admin.layout_back')
@section('title')
    Data Order
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
                                    <h3 class="card-title mt-2 fw-bold">Data Order</h3>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-sm-right">
                                    <a href="{{ url('admin/order/insert') }}" class="btn btn-success">Tambah</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover mb-2">
                            <thead>
                                <tr>
                                    <th class="col-1">No</th>
                                    <th>Nama</th>
                                    <th>Tanggal Order</th>
                                    <th>Total</th>
                                    <th>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    if(empty($_GET['page']))
                                    $i=1;
                                    else
                                    $i = ($_GET['page'] * $orders->count()) - ($orders->count() - 1)
                                @endphp
                                @foreach ($orders as $row)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $row->user->name }}</td>
                                        <td>{{ date('j F Y', strtotime($row->tgl_order)) }}</td>
                                        <td>Rp. {{ number_format($row->total) }}</td>
                                        <td>
                                            <a href="{{ url('admin/order/edit/'.$row->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                            <a href="{{ url('admin/order/delete/'.$row->id) }}" onclick="return confirm('Are you sure?')";><button type="button" class="btn btn-sm btn-danger fa fa-trash-alt"></button></a>
                                            <a href="{{url('admin/order/item/'.$row->id)}}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection