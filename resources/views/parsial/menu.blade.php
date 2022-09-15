@extends('layout')
{{-- @section('judul','Dashboard') --}}
@section('isi')
{{-- Tabel Menu --}}
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
                            <th class="col-1">Harga</th>
                            <th class="col-1">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menu_makanan as $item)
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
                <h3 class="card-title">Daftar Minuman</h3>
            </div>
    
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Menu</th>
                            <th class="col-1">Harga</th>
                            <th class="col-1">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menu_minuman as $item)
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
</div>
@endsection