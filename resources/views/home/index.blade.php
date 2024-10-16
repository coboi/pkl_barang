@extends('layouts.app')
@section('title', 'Beranda')
@section('content')
    <div>
        <h1>Beranda</h1>
        <ul>
            <li><a href="{{ route('master.barang.index') }}">Barang</a></li>
        </ul>
    </div>
@endsection
