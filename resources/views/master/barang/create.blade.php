@extends('layouts.app')
@section('title', 'Tambah Barang')
@section('content')
    <div>
        <h1>Tambah Barang</h1>
        <a href="{{ route('master.barang.index') }}">Kembali</a>
        <form action="{{ route('master.barang.store') }}" method="POST">
            @csrf
            <div>
                <label for="nama">Nama Barang</label>
                <input type="text" name="nama" id="nama" />
                @error('nama')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga" />
                @error('harga')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" />
                @error('jumlah')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
@endsection
