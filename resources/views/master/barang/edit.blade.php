@extends('layouts.app')
@section('title', 'Edit Barang')
@section('content')
    <div>
        <h1>Edit Barang</h1>
        <a href="{{ route('master.barang.index') }}">Kembali</a>
        <form action="{{ route('master.barang.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="nama">Nama Barang</label>
                <input type="text" name="nama" id="nama" value="{{ $barang->nama }}" />
                @error('nama')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga" value="{{ $barang->harga }}" />
                @error('harga')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" value="{{ $barang->jumlah }}" />
                @error('jumlah')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit">Perbarui</button>
            </div>
        </form>
    </div>
@endsection
