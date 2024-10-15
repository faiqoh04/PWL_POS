@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Detail Stok</h3>
        <div class="card-tools">
            <a href="{{ url('stok') }}" class="btn btn-sm btn-default">Kembali</a>
        </div>
    </div>
    <div class="card-body">
        @empty($stok)
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                Data stok yang Anda cari tidak ditemukan.
            </div>
        @else
            <table class="table table-bordered table-hover">
                <tr>
                    <th>ID Stok</th>
                    <td>{{ $stok->stok_id }}</td>
                </tr>
                <tr>
                    <th>Nama Barang</th>
                    <td>{{ $stok->barang->barang_nama }}</td>
                </tr>
                <tr>
                    <th>Supplier</th>
                    <td>{{ $stok->supplier->supplier_nama }}</td>
                </tr>
                <tr>
                    <th>User</th>
                    <td>{{ $stok->user->nama }}</td>
                </tr>
                <tr>
                    <th>Tanggal Stok</th>
                    <td>{{ \Carbon\Carbon::parse($stok->stok_tanggal)->format('d M Y') }}</td>
                </tr>
                <tr>
                    <th>Jumlah Stok</th>
                    <td>{{ $stok->stok_jumlah }}</td>
                </tr>
            </table>
        @endempty
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
