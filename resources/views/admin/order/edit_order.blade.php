@extends('admin.layout_back')
@section('title')
    Edit Order
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Order</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/order/'.$orders->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="user_id" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-4">
                                    <select name="user_id" id="" class="form-select @error('user_id') is-invalid @enderror">
                                        @foreach ($users as $row)
                                            <option value="{{ $row->id }}" {{ (old('user_id', $orders->user_id) == $row->id) ? 'selected' : '' }}>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('user_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="tgl_order" class="col-sm-2 col-form-label">Tanggal Order</label>
                                <div class="col-sm-4">
                                    <input type="date" name="tgl_order" id="" class="form-control @error('tgl_order') is-invalid @enderror" value="{{ old('tgl_order', $orders->tgl_order) }}">
                                </div>
                                @error('tgl_order')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-success">Update</button>
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