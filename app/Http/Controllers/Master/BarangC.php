<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\BarangM;
use Illuminate\Http\Request;

class BarangC extends Controller
{
    public function index()
    {
        $dataBarang = BarangM::all();
        return view('master.barang.index', compact('dataBarang'));
    }

    public function create()
    {
        return view('master.barang.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nama' => 'required',
                'harga' => ['required', 'numeric'],
                'jumlah' => ['required', 'numeric'],
            ],
            [
                'nama.required' => 'Nama harus diisi',
                'harga.required' => 'Harga harus diisi',
                'jumlah.required' => 'Jumlah harus diisi',
                'harga.numeric' => 'Harga harus angka',
                'jumlah.numeric' => 'Jumlah harus angka',
            ]
        );

        $barang = BarangM::create($validated);

        if ($barang) {
            return redirect()->route('master.barang.index')->with('pesan', 'Barang berhasil ditambahkan!');
        } else {
            return redirect()->route('master.barang.index')->with('pesan', 'Gagal menambahkan barang!');
        }
    }

    public function show($id)
    {
        $barang = BarangM::find($id);

        if ($barang) {
            return view('master.barang.edit', compact('barang'));
        } else {
            return redirect()->route('master.barang.index')->with('pesan', 'Barang dengan ID ' . $id . ' tidak ada!');
        }
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate(
            [
                'nama' => 'required',
                'harga' => ['required', 'numeric'],
                'jumlah' => ['required', 'numeric'],
            ],
            [
                'nama.required' => 'Nama harus diisi',
                'harga.required' => 'Harga harus diisi',
                'jumlah.required' => 'Jumlah harus diisi',
                'harga.numeric' => 'Harga harus angka',
                'jumlah.numeric' => 'Jumlah harus angka',
            ]
        );

        $updated = BarangM::where('id', $id)->update($validated);

        if ($updated) {
            return redirect()->route('master.barang.index')->with('pesan', 'Barang berhasil diperbarui!');
        } else {
            return redirect()->route('master.barang.index')->with('pesan', 'Barang dengan ID ' . $id . ' tidak ada!');
        }


        return redirect()->route('master.barang.index');
    }

    public function destroy($id)
    {
        $deleted = BarangM::destroy($id);

        if ($deleted) {
            return redirect()->route('master.barang.index')->with('pesan', 'Berhasil menghapus barang dengan ID ' . $id . '!');
        } else {
            return redirect()->route('master.barang.index')->with('pesan', 'Barang dengan ID ' . $id . ' tidak ada!');
        }
    }
}
