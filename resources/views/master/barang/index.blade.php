@extends('layouts.app')
@section('title', 'Barang')
@section('content')
    <div>
        <h1>Barang</h1>
        <button><a href="{{ route('master.barang.create') }}">Tambah Barang</a></button>
        <h2>Data Barang</h2>
        @if (session('pesan'))
            <div style="background-color: yellow">
                {{ session('pesan') }}
            </div>
        @endif
        <table border="1">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalJumlah = 0;
                    $totalNilai = 0;
                @endphp

                @foreach ($dataBarang as $barang)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $barang->id }}</td>
                        <td>{{ $barang->nama }}</td>
                        <td>{{ $barang->harga }}</td>
                        <td>{{ $barang->jumlah }}</td>
                        <td>{{ $barang->jumlah * $barang->harga }}</td>
                        <td>
                            <button><a href="{{ route('master.barang.show', $barang->id) }}">Edit</a></button>
                            <form action="{{ route('master.barang.destroy', $barang->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>

                    @php
                        $totalJumlah += $barang->jumlah;
                        $totalNilai += $barang->jumlah * $barang->harga;
                    @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">Total</td>
                    <td>{{ $totalJumlah }}</td>
                    <td>{{ $totalNilai }}</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
