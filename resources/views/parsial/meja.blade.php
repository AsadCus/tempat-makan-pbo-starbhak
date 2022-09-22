@extends('layout')
{{-- @section('judul','Dashboard') --}}
@section('isi')
{{-- Tabel Menu --}}
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Meja</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nomor Meja</th>
                    <th class="col-2">Status</th>
                    <th class="col-1"></th>
                </tr>
            </thead>
            <tbody>
                <tr>            
                    <form action="/meja/store" method="POST">
                        @csrf
                        <td></td>
                        <td>
                            <input type="text" class="form-control text-capitalize" name="no_meja" placeholder="No. Meja">
                        </td>
                        <td>
                            <input type="text" class="form-control text-capitalize" name="status" value="tersedia" disabled>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </td>
                    </form>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Meja</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Nomor Meja</th>
                    <th class="col-2">Status</th>
                    <th class="col-1">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($meja as $item)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $item->no_meja }}</td>
                    <td class="text-capitalize">{{ $item->status }}</td>
                    <td class="d-flex">
                        <form action="/meja/deactive/{{ $item->id }}" method="POST">
                            @csrf
                            <input type="text" name="status" value="{{ $item->status }}" class="d-none">
                            <button type="submit" class="btn btn-secondary btn-sm">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </form>
                        @if (Auth::user()->level == 'admin')
                        |
                        <form action="/meja/delete/{{ $item->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" href="#">«</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul>
    </div> --}}
</div>
@endsection