@extends('layout')
{{-- @section('judul','Dashboard') --}}
@section('isi')
<!-- Modal -->
<div class="modal fade" id="profilRestoModal" tabindex="-1" aria-labelledby="profilRestoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <form action="/resto/update/{{ $restos->first()->id }}" method="POST" id="formResto">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="inputNamaProfilResto">Nama</label>
                        <input type="text" name="nama_resto" class="form-control" id="inputNamaProfilResto" value="{{ $restos->first()->nama_resto }}">
                    </div>
                    <div class="form-group">
                        <label for="inputProfilProfilResto">Profil</label>
                        <input type="text" name="profil" class="form-control" id="inputProfilProfilResto" value="{{ $restos->first()->profil }}">
                    </div>
                    <div class="form-group">
                        <label for="inputAlamatProfilResto">Alamat</label>
                        <textarea name="alamat" class="form-control" id="inputAlamatProfilResto">{{ $restos->first()->alamat }}</textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn border" form="formResto">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Menu</span>
                <span class="info-box-number">
                    {{ $menu->count() }}
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Menu Tersedia</span>
                <span class="info-box-number">{{ $menu->where('status', 'tersedia')->count() }}</span>
            </div>
        </div>
    </div>
    <div class="clearfix hidden-md-up"></div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total transaksi</span>
                <span class="info-box-number">{{ $pesanan->count() }}</span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Karyawan</span>
                <span class="info-box-number">{{ $user->where('level', '!=', 'admin')->count() }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
</div>

<div class="row">

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Menu</h3>
            </div>
    
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Menu</th>
                            <th class="col-2">Harga</th>
                            <th class="col-1">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menu as $item)
                        <tr>
                            <th>{{ $loop->iteration }}.</th>
                            <th class="text-capitalize">{{ $item->nama_menu }} - {{ $item->jenis->jenis  }}</th>
                            <th>{{ $item->harga }}</th>
                            <th class="text-capitalize">{{ $item->status }}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-6">
            <div class="card h-100">
                <div class="row row-0 h-100">
                  <div class="col-7 h-100 order-md-last">
                    <img src="/images/asad-mie.jpg" class="w-100 h-100 object-cover" alt="Card side image" style="object-fit: cover;">
                  </div>
                  <div class="col">
                    <div class="card-body">
                    <button type="button" class="btn" style="position: absolute; right: 1rem; top: 1rem;" data-toggle="modal" data-target="#profilRestoModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                            <path fill-rule="evenodd"
                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                        </svg>
                    </button>
                      <h3 class="h3">{{ $restos->first()->nama_resto }}</h3>
                      <br>
                      <p class="text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle pb-1" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                          </svg>&nbsp;
                          {{ $restos->first()->profil }}
                        </p>
                      <p class="text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-map-fill pb-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
                            <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
                          </svg>&nbsp;
                          {{ $restos->first()->alamat }}
                        </p>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>

</div>
@endsection