<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Order;
use App\Models\Rasa;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'AdminMiddleware']); // Membatasi hanya pengguna login
    }

    public function index()
    {
        $pesanan = Pesanan::all(); // Ambil semua data event dari database
        return view('admin', compact('pesanan'));
    }

    public function showAdmin()
    {
    
        return view('admin');
    }

    public function showProducts()
    {
            // Ambil semua data dari tabel 'rasa'
            $rasas = Rasa::all();

            // Kirim data ke view 'admin.products'
            return view('products', compact('rasas'));
    }

    public function showCompletedOrders()
    {
        // Ambil data pesanan dengan status 'completed'
        $completedOrders = Pesanan::where('status_pesanan', 'completed')->get();
    
        // Kirim data ke view
        return view('admin', compact('completedOrders'));
    }



    // Menampilkan halaman pesanan dengan status 'pending'
    public function showOrders()
    {
        $orders = Order::where('status_pesanan', 'pending')->get();
        return view('orders', compact('orders'));
    }

    // Mengubah status pesanan menjadi 'completed'
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status_pesanan = 'completed';
        $order->save();

        return redirect()->route('admin.form')->with('success', 'Pesanan berhasil diproses!');
    }

}
