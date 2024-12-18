<?php

namespace App\Http\Controllers;

use App\Models\Rasa;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Menampilkan form pemesanan
    public function create()
    {
        // Ambil semua data rasa dari database
        $rasas = Rasa::all();

        // Kirim data rasa ke view
        return view('pemesanan2', compact('rasas'));
    }

    // Menyimpan pesanan
    public function submitOrder(Request $request)
    {
        // Validasi input
        $request->validate([
            'tipe_pengiriman' => 'required',
            'kategori' => 'required',
            'rasa' => 'array|required|min:1|max:3', // Maksimal 3 rasa
            'rasa.*' => 'required|exists:rasa,id', // Validasi id rasa harus ada di tabel rasa
            'alamat_pengiriman' => 'nullable|string'
        ]);

        // Ambil ID pengguna yang login
        $userId = Auth::id();

        // Ambil data harga dari tabel rasa
        $totalHarga = 0;
        foreach ($request->rasa as $rasaId) {
            $rasa = Rasa::find($rasaId);
            if ($rasa) {
                $totalHarga += $rasa->harga;
            }
        }

        // Simpan pesanan ke dalam database
        $order = new Order();
        $order->user_id = $userId; // Simpan ID User
        $order->tipe_pengiriman = $request->tipe_pengiriman;
        $order->kategori = $request->kategori;
        $order->alamat_pengiriman = $request->tipe_pengiriman === 'delivery' ? $request->alamat_pengiriman : null;

        // Simpan id rasa ke kolom rasa_1, rasa_2, rasa_3
        $order->rasa_1 = $request->rasa[0] ?? null;
        $order->rasa_2 = $request->rasa[1] ?? null;
        $order->rasa_3 = $request->rasa[2] ?? null;

        // Simpan total harga
        $order->total_harga = $totalHarga;

        $order->save();

        return redirect()->route('order.success')->with('success', 'Pesanan berhasil disimpan!');
    }

    // Menampilkan halaman sukses setelah pesanan
    public function orderSuccess()
    {
        return view('terimakasih');
    }
}
