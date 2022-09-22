@extends('layout')
{{-- @section('judul','Dashboard') --}}
@section('isi')
{{-- Tabel Menu --}}
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Menu</h3>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Menu</th>
                    <th class="col-2">M/M</th>
                    <th class="col-2">Harga</th>
                    <th class="col-1"></th>
                </tr>
            </thead>
            <tbody>
                <tr>            
                    <form action="/menu/store" method="POST">
                        @csrf
                        <td></td>
                        <td>
                            <input type="text" class="form-control text-capitalize" name="nama_menu" placeholder="Nama Menu">
                        </td>
                        <td>
                            <select name="jenis_id" id="" class="form-control text-capitalize">
                                <option selected>Pilih..</option>
                                @foreach ($jenis as $item)
                                    <option value="{{ $item->id }}">{{ $item->jenis }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="text" name="harga" class="form-control" id="dengan-rupiah" placeholder="Rp.">
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

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Makanan</h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Menu</th>
                            <th class="col-2">Harga</th>
                            <th class="col-1">Status</th>
                            <th class="col-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menu_makanan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td class="d-none menu-name">{{ $item->nama_menu }}</td>
                            <td class="d-none menu-jenis-id">{{ $item->jenis->id }}</td>
                            <td class="d-none menu-jenis">{{ $item->jenis->jenis }}</td>
                            <td class="text-capitalize">{{ $item->nama_menu }} - {{ $item->jenis->jenis  }}</td>
                            <td class="menu-harga">{{ $item->harga }}</td>
                            <td class="text-capitalize">{{ $item->status }}</td>
                            <td class="d-flex">
                                <button type="button" class="btn btn-info btn-sm tombol-edit" data-toggle="modal"
                                    data-target="#modalEditMenu" data-id="{{ $item->id }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>|
                                <form action="/menu/delete/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>|
                                <form action="/menu/deactive/{{ $item->id }}" method="POST">
                                    @csrf
                                    <input type="text" name="status" value="{{ $item->status }}" class="d-none">
                                    <button type="submit" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                </form>
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
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Makanan</h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Menu</th>
                            <th class="col-2">Harga</th>
                            <th class="col-1">Status</th>
                            <th class="col-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menu_minuman as $item)
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td class="d-none menu-name">{{ $item->nama_menu }}</td>
                            <td class="d-none menu-jenis-id">{{ $item->jenis->id }}</td>
                            <td class="d-none menu-jenis">{{ $item->jenis->jenis }}</td>
                            <td class="text-capitalize">{{ $item->nama_menu }} - {{ $item->jenis->jenis  }}</td>
                            <td class="menu-harga">{{ $item->harga }}</td>
                            <td class="text-capitalize">{{ $item->status }}</td>
                            <td class="d-flex">
                                <button type="button" class="btn btn-info btn-sm tombol-edit" data-toggle="modal"
                                    data-target="#modalEditMenu" data-id="{{ $item->id }}">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>|
                                <form action="/menu/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>|
                                <form action="/menu/deactive/{{ $item->id }}" method="POST">
                                    @csrf
                                    <input type="text" name="status" value="{{ $item->status }}" class="d-none">
                                    <button type="submit" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                </form>
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
    </div>
</div>

{{-- Modal Edit Menu --}}
<div class="modal fade" id="modalEditMenu" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit Menu</h5>
            </div>
            <form action="/menu/update/{{ $item->id }}" method="POST" class="form-edit">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    {{-- <input type="hidden" name="id" class="menuId"> --}}
                    <div class="form-group">
                        <label for="">Nama Menu</label>
                        <input type="text" name="nama_menu" class="form-control input-menu-name">
                    </div>
                    <div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" name="harga" class="form-control input-menu-harga dengan-rupiah">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Menu</label>
                        <select class="form-control selected" name="jenis_id" required>
                            <option class="input-menu-jenis-id" selected></option>
                            @foreach ($jenis as $item)
                            <option value="{{ $item->id }}">{{ $item->jenis }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection