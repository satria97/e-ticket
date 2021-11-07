@extends('admin.layout_back')
@section('title')
    Edit Ticket
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Ticket</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/admin/ticket/'.$events->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="event_id" class="col-sm-2 col-form-label">Nama EVent</label>
                                <div class="col-sm-4">
                                    <select name="event_id" id="" class="form-select @error('event_id') is-invalid                                        
                                    @enderror">
                                        @foreach ($events as $row)
                                            <option value="{{ $row->id }}" {{ (old('event_id', $tickets->event_id) == $row->id) ? 'selected' : ''}}>{{ $row->nm_event }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('event_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-4">
                                    <input type="text" name="harga" class="form-control @error('harga') is-invalid
                                    @enderror" value="{{ old('harga', $tickets->harga) }}">
                                </div>
                                @error('harga')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                                <div class="col-sm-4">
                                    <input type="text" name="stok" class="form-control @error('stok') is-invalid                                        
                                    @enderror" value="{{ old('stok',$events->stok) }}">
                                </div>
                                @error('stok')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="diskon" class="col-sm-2 col-form-label">Diskon</label>
                                <div class="col-sm-4">
                                    <input type="text" name="diskon" class="form-control @error('diskon') is-invalid                                        
                                    @enderror" value="{{ old('diskon', $events->diskon) }}">
                                </div>
                                @error('diskon')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="{{ url('admin/ticket') }}" class="btn btn-secondary">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection