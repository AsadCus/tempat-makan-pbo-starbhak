@extends('layout')
{{-- @section('judul','Dashboard') --}}
@section('isi')
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
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Activity</h3>
            </div>
    
            <div class="card-body">
                <table class="table">
                    <thead>
                    </thead>
                    <tbody>
                        <tr>
                            <th style="width: 10px;">1</th>
                            <th>Budi lekas bangun</th>
                            <th class="col-3">Sejam yang lalu</th>
                        </tr>                 
                        <tr>
                            <th style="width: 10px;">2</th>
                            <th>Budi lekas bangun</th>
                            <th class="col-3">Sejam yang lalu</th>
                        </tr>                 
                        <tr>
                            <th style="width: 10px;">3</th>
                            <th>Budi lekas bangun</th>
                            <th class="col-3">Sejam yang lalu</th>
                        </tr>                 
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

</div>
@endsection