@extends('admin.layout_back')
@section('title')
    Add Order
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Order</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/order/insert-proses') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="user_id" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-4">
                                    <select name="user_id" class="form-select @error('user_id') is-invalid @enderror" id="">
                                        <option value="">--Pilih--</option>
                                        @foreach ($users as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tgl_order" class="col-sm-2 col-form-label">Tanggal Order</label>
                                <div class="col-sm-4">
                                    <input type="date" name="tgl_order" id="" class="form-control @error('tgl_order') is-invalid                                        
                                    @enderror" value="{{ old('tgl_order') }}">
                                </div>
                                @error('tgl_order')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ url('admin/order') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection