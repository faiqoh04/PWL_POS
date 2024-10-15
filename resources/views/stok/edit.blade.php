@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Stok</h3>
        <div class="card-tools">
            <a href="{{ url('stok') }}" class="btn btn-sm btn-default">Kembali</a>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('stok.update', $stok->stok_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Nama Barang</label>
                <div class="col-10">
                    <select class="form-control" name="barang_id" required>
                        <option value="">- Pilih Barang -</option>
                        @foreach ($barangs as $barang)
                            <option value="{{ $barang->barang_id }}" {{ $barang->barang_id == $stok->barang_id ? 'selected' : '' }}>
                                {{ $barang->barang_nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('barang_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Supplier</label>
                <div class="col-10">
                    <select class="form-control" name="supplier_id" required>
                        <option value="">- Pilih Supplier -</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->supplier_id }}" {{ $supplier->supplier_id == $stok->supplier_id ? 'selected' : '' }}>
                                {{ $supplier->supplier_nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('supplier_id')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Tanggal Stok</label>
                <div class="col-10">
                    <input type="date" class="form-control" name="stok_tanggal" value="{{ old('stok_tanggal', $stok->stok_tanggal) }}" required>
                    @error('stok_tanggal')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Jumlah Stok</label>
                <div class="col-10">
                    <input type="number" class="form-control" name="stok_jumlah" value="{{ old('stok_jumlah', $stok->stok_jumlah) }}" required>
                    @error('stok_jumlah')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
