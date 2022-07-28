@extends('layout')
@section('judul','Dashboard')
@section('isi')
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Menu</span>
                <span class="info-box-number">
                    10
                </span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Menu Tersedia</span>
                <span class="info-box-number">8</span>
            </div>
        </div>
    </div>
    <div class="clearfix hidden-md-up"></div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total transaksi</span>
                <span class="info-box-number">320</span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">?</span>
                <span class="info-box-number">?</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4>Menu</h4>
            </div>
            <div class="card-body">
                
            </div>
        </div>
        <div class="card mt-sm-5 mt-md-0">
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4>Activity</h4>
            </div>
            <div class="card-body">
                
            </div>
        </div>
    </div>
</div>
@endsection