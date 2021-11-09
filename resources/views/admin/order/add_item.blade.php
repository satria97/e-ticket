@extends('admin.layout_back')
@section('title')
    Add Item
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Item</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/order/item-proses/'. $id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <input type="hidden" class="form-control" name="order_id" id="order_id" value="{{$id}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ticket_id" class="col-sm-2 col-form-label">Nama Ticket</label>
                                <div class="col-sm-4">
                                    <select name="ticket_id" id="" class="form-select @error('ticket_id') is-invalid @enderror">
                                        <option value="">--Pilih--</option>
                                        @foreach ($tickets as $row)
                                            <option value="{{ $row->id }}">{{ $row->nm_event }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('ticket_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="qty" class="col-sm-2 col-form-label">Jumlah Tiket</label>
                                <div class="col-sm-4">
                                    <input type="text" name="qty" class="form-control @error('qty') is-invalid
                                    @enderror" value="{{ old('qty') }}">
                                </div>
                                @error('qty')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover mb-2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Event</th>
                                    <th>Jumlah Tiket</th>
                                    <th>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    if(empty($_GET['page']))
                                    $i=1;
                                    else
                                    $i= ($_GET['page'] * $order_items->count()) - ($order_items->count() - 1);
                                @endphp
                                @foreach ($order_items as $row)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $row->nm_event }}</td>
                                    <td>{{ $row->qty }}</td>
                                    <td>
                                        <a href="{{url('admin/order/item/'.$row->order_id.'/edit/'.$row->id)}}" class="btn btn-sm btn-warning">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{url('admin/order/item/'.$row->order_id.'/delete/'.$row->id)}}" onclick="return confirm('Are you sure?')" ;><button type="button" class="btn btn-sm btn-danger fa fa-trash-alt"></button></a>
                                    </td>
                                </tr>                          
                                @endforeach
                            </tbody>
                        </table>
                        {{ $order_items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection