@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Detail Penjualan</h3>
        <div class="card-tools">
            <a href="{{ url('penjualan') }}" class="btn btn-sm btn-default">Kembali</a>
        </div>
    </div>
    <div class="card-body">
        @empty($penjualan)
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                Data yang Anda cari tidak ditemukan.
            </div>
        @else
            <ul class="list-group">
                <li class="list-group-item">
                    <strong>Kode Penjualan:</strong> {{ $penjualan->penjualan_kode }}
                </li>
                <li class="list-group-item">
                    <strong>Pembeli:</strong> {{ $penjualan->pembeli }}
                </li>
                <li class="list-group-item">
                    <strong>Tanggal Penjualan:</strong> {{ \Carbon\Carbon::parse($penjualan->penjualan_tanggal)->format('d M Y') }}
                </li>
            </ul>
        @endempty
    </div>
</div>
@endsection
