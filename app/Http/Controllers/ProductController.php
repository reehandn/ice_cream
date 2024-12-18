<?php

namespace App\Http\Controllers;

use App\Models\Rasa;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $rasas = Rasa::all();
        return view('products', compact('rasas'));
    }

    // Menambahkan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_rasa' => 'required|string|unique:rasa',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        Rasa::create($request->all());
        return back()->with('success', 'Produk berhasil ditambahkan.');
    }

    // Update data produk
    public function update(Request $request, $id)
    {
        $request->validate([
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $rasa = Rasa::findOrFail($id);
        $rasa->update($request->all());
        return back()->with('success', 'Produk berhasil diperbarui.');
    }

    // Hapus produk
    public function destroy($id)
    {
        Rasa::findOrFail($id)->delete();
        return back()->with('success', 'Produk berhasil dihapus.');
    }
}
