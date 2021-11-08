@extends('admin.layout_back')
@section('title')
    Tambah Ticket
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Ticket</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/admin/ticket/insert-proses') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="event_id" class="col-sm-2 col-form-label">Nama Event</label>
                                <div class="col-sm-4">
                                    <select name="event_id" id="" class="form-select @error('event_id') is-invalid                                        
                                    @enderror">
                                        <option value="">--Pilih Event--</option>
                                        @foreach ($events as $row)
                                            <option value="{{ $row->id }}">{{ $row->nm_event }}</option>
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
                                    @enderror" value="{{ old('harga') }}">
                                </div>
                                @error('harga')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                                <div class="col-sm-4">
                                    <input type="text" name="stok" class="form-control @error('stok') is-invalid                                        
                                    @enderror" value="{{ old('stok') }}">
                                </div>
                                @error('stok')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="diskon" class="col-sm-2 col-form-label">Diskon</label>
                                <div class="col-sm-4">
                                    <input type="text" name="diskon" class="form-control @error('diskon') is-invalid                                        
                                    @enderror" value="{{ old('diskon') }}">
                                </div>
                                @error('diskon')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-4">
                                    <input type="file" class="form-control  @error('gambar') is-invalid @enderror" name="gambar" value="{{ old('gambar') }}">
                                </div>
                                @error('gambar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label">Status Tiket</label>
                                <div class="col-sm-4">
                                    <select class="form-select @error('status') is-invalid @enderror" name="status">
                                        <option value="">--Pilih--</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
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