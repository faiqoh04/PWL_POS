@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Penjualan</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('penjualan.update', $penjualan->penjualan_id) }}" method="POST">
            @csrf
            @method('PUT')
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            
            <div class="form-group">
                <label>Pembeli</label>
                <input type="text" class="form-control" name="pembeli" value="{{ old('pembeli', $penjualan->pembeli) }}" required>
                @error('pembeli')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Kode Penjualan</label>
                <input type="text" class="form-control" name="penjualan_kode" value="{{ old('penjualan_kode', $penjualan->penjualan_kode) }}" required>
                @error('penjualan_kode')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Tanggal Penjualan</label>
                <input type="date" class="form-control" name="penjualan_tanggal" value="{{ old('penjualan_tanggal', $penjualan->penjualan_tanggal) }}" required>
                @error('penjualan_tanggal')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-default" href="{{ url('penjualan') }}">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
