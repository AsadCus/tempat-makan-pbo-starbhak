@extends('layout')
{{-- @section('judul','Dashboard') --}}
@section('isi')

{{-- Tabel Pesanan --}}
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Pesanan</h3>
        <a href="/pesanan/store" class="btn btn-secondary btn-sm float-right">Tes</a>
        <button type="button" id="buttonPesan" class="btn btn-secondary btn-sm float-right" data-toggle="modal" data-target="#modalPemesanan">
            Pesan
        </button>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>User</th>
                    <th>Kode Pesanan</th>
                    <th>Meja</th>
                    <th class="col-1">Status</th>
                    <th class="col-1">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($pesanan->where('status', '==', 'active') as $item) --}}
                @foreach ($pesanan as $item)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $item->user->username }}</td>
                    {{-- <td>@currency($item->detail_pesanan->sum('jml_harga'))</td> --}}
                    <td>
                        <a href="" class="modal-detail-pesanan" role="button" data-toggle="modal" data-target="#detailPesanan" data-pesanan_id="{{ $item->id }}">{{ $item->kode_pesanan }}</a>
                    </td>
                    <td>No.{{ $item->meja->no_meja }}</td>
                    <td class="text-capitalize">{{ $item->status }}</td>
                    <td>
                        {{-- <button type="button" class="btn btn-info btn-sm tombol-edit" data-toggle="modal"
                            data-target="#modalEditUser" data-id="{{ $item->id }}">
                            <i class="fas fa-pencil-alt"></i>
                        </button>| --}}
                        @if ($item->status != 'close')
                        <button type="button" class="btn btn-secondary btn-sm tombol-edit" data-toggle="modal"
                            data-target="#modalPembayaran" data-id="{{ $item->id }}">
                            <i class="bi bi-cash"></i>
                        </button>
                        @endif
                        {{-- <form action="/pesanan/bayar/{{ $item->id }}" method="POST">
                            @csrf
                            <input type="text" name="meja_id" value="{{ $item->meja_id }}" class="d-none">
                            <button class="btn btn-danger btn-sm">
                                <i class="bi bi-cash"></i>
                            </button>
                        </form> --}}
                        {{-- <form action="/pesanan/bayar/{{ $item->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<button id="tes">tes</button>
<p id="disini"></p>

{{-- @if ( Auth::user()->level == 'admin' )
    <button class="btn btn-primary rounded-circle" style="width: 40px; height: 40px; position: absolute; bottom: 0; right: 0; margin-right: 25px; margin-bottom: 75px;" data-toggle="modal" data-target="#modalAddUser">
        <i class="bi bi-plus"></i>
    </button>
@endif --}}

{{-- Modal Edit User --}}
{{-- <div class="modal fade" id="modalEditUser" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Edit</h5>
            </div>
            <form action="/user/update/{{ $item->id }}" method="POST" class="form-edit">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control input-user-username">
                    </div>
                    <div class="form-group">
                        <label for="">Emai</label>
                        <input type="email" name="email" class="form-control input-user-email">
                    </div>
                    <div class="form-group">
                        <label for="">Level</label>
                        <select class="form-control text-capitalize selected" name="level" required>
                            <option class="input-user-level" selected></option>
                            <option value="manajer">Manajer</option>
                            <option value="staff">Staff</option>
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
</div> --}}
{{-- Modal Add Pesanan --}}
<div class="modal fade" id="modalPemesanan" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pesan Makanan</h5>
            </div>
            <form action="/pesanan/store" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="text-capitalize">Staff : {{ Auth::user()->username }}</label>
                        {{-- <input type="text" class="form-control d-none" name="user_id" value="{{ Auth::user()->id }}" disabled> --}}
                    </div>
                    <div class="form-group">
                        <label for="">Kode Pesanan : {{ $kode }}</label>
                        <input type="text" class="form-control d-none" name="kode_pesanan" value="{{ $kode }}" disabled>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="meja_id">Meja :</label>
                        </div>
                        <select name="meja_id" class="form-control" required>
                            <option selected>Pilih..</option>
                            @foreach ($meja->where('status', 'tersedia') as $item)
                                <option value="{{ $item->id }}">{{ $item->no_meja }}</option>
                            @endforeach
                        </select>
                      </div>
                    <form action="" method="POST">
                        <table class="table table-borderless">
                            <tr class="d-flex justify-content-between">
                                <td style="padding: 0;" class="col-11">
                                    <div class="input-group menu-body">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="menu_id">Menu :</label>
                                        </div>
                                        <select name="menu_id" id="menuSelect" class="form-control selectPemesanan pilih-menu" onchange="jmlHarga()" required>
                                            <option selected>Pilih Menu..</option>
                                            @foreach ($menu->where('status', 'tersedia') as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_menu }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" id="jumlahMenu" class="form-control col-1" name="qty" placeholder="Qty" value="1">
                                        <input type="text" id="jml_harga" class="form-control col-3 dengan-rupiah total-harga" placeholder="Jumlah Harga" name="jml_harga">
                                    </div>
                                </td>
                                {{-- <td style="padding: 0;" class="col-2">
                                    <input type="number" class="form-control" name="qty" placeholder="Jumlah">
                                </td> --}}
                                {{-- <td style="padding: 0;" class="col-3">
                                    <input type="number" class="form-control" placeholder="Jumlah Harga" name="jml_harga" disabled>
                                </td> --}}
                                <td style="padding: 0;" class="col-1">
                                    <a href="/pesanan/store" class="btn btn-secondary float-right">Add</a>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Menu</th>
                                <th class="col-1">Qty</th>
                                <th class="col-2">Harga</th>
                                <th class="col-1">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($menu_pesanan as $item) --}}
                            <tr>
                                {{-- <td>{{ $loop->iteration }}.</td> --}}
                                <td>1.</td>
                                <td>Mie Ayam - Makanan</td>
                                <td>2</td>
                                <td>Rp.30.000</td>
                                <td>
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalPembayaran" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pembayaran</h5>
            </div>
            <form action="/pesanan/bayar/" method="POST">
                @csrf
                {{-- <div class="modal-body">
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label for="">Emai</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="">Level</label>
                        <select name="level" class="form-control" required>
                            <option selected>Pilih..</option>
                            <option value="manajer">Manajer</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                </div> --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Detail Pesanan --}}
<div class="modal fade" id="detailPesanan" tabindex="-1" aria-labelledby="detailPesananLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailPesananLabel">*kode pesanan*</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <dl class="row body-detail-pesanan">
                    <dt class="col-sm-3">Tanggal :</dt>
                    <dd class="col-sm-9">
                        <p>2022-09-23</p>
                    </dd>

                    <dt class="col-sm-3">Menu :</dt>
                    <dd class="col-sm-9">
                        <dl class="row">
                            <dt class="col-sm-4">Rp 15.000,00</dt>
                            <dd class="col-sm-8">Bakso</dd>
                            <dt class="col-sm-4">Rp 15.000,00</dt>
                            <dd class="col-sm-8">Bakso</dd>
                            <dt class="col-sm-4">Rp 15.000,00</dt>
                            <dd class="col-sm-8">Bakso</dd>
                        </dl>
                    </dd>

                    <dt class="col-sm-3">Total Harga :</dt>
                    <dd class="col-sm-9">
                        <strong>Rp 100.000,00</strong>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection