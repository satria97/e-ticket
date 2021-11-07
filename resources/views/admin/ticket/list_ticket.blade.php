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
                                    <a href="{{ url('/admin/ticket/insert') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection