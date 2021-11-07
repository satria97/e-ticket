@extends('admin.layout_back')
@section('title')
    Edit Event
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Event</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/event/'.$events->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Nama Event</label>
                                <div class="col-sm-4">
                                    <input type="text" name="nm_event" class="form-control @error('nm_event') is-invalid
                                    @enderror" value="{{ old('nm_event', $events->nm_event) }}">
                                </div>
                                @error('nm_event')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                                <div class="col-sm-4">
                                    <input type="text" name="slug" id="" class="form-control @error('slug') is-invalid
                                    @enderror" value="{{ old('slug', $events->slug) }}">
                                </div>
                                @error('slug')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="tgl_event" class="col-sm-2 col-form-label">Tanggal Event</label>
                                <div class="col-sm-4">
                                    <input type="date" name="tgl_event" class="form-control @error('tgl_event') is-invalid
                                    @enderror" value="{{ old('tgl_event', $events->tgl_event) }}">
                                </div>
                                @error('tgl_event')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="jam_mulai" class="col-sm-2 col-form-label">Mulai</label>
                                <div class="col-sm-4">
                                    <input type="text" name="jam_mulai" class="form-control @error('jam_mulai') is-invalid                                        
                                    @enderror" value="{{ old('jam_mulai', $events->jam_mulai) }}">
                                </div>
                                @error('jam_mulai')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="jam_selesai" class="col-sm-2 col-form-label">Selesai</label>
                                <div class="col-sm-4">
                                    <input type="text" name="jam_selesai" class="form-control @error('jam_selesai') is-invalid                                        
                                    @enderror" value="{{ old('jam_selesai', $events->jam_selesai) }}">
                                </div>
                                @error('jam_selesai')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                                <div class="col-sm-4">
                                    <input type="text" name="lokasi" id="" class="form-control @error('lokasi') is-invalid                                        
                                    @enderror" value="{{ old('lokasi', $events->lokasi) }}">
                                </div>
                                @error('lokasi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-4">
                                    <textarea name="deskripsi" id="" rows="5" class="form-control @error('deskripsi') is-invalid                                        
                                    @enderror">{{ old('deskripsi', $events->deskripsi) }}</textarea>
                                </div>
                                @error('deskripsi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a class="btn btn-secondary" href="{{ url('admin/event') }}">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection