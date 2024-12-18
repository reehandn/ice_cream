<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
<!-- Sidebar -->
<aside class="sidebar">
    <div class="sidebar-header">
        <img src="asset/logooo.jpg" alt="Amora" class="logo">
        <h2>Amora</h2>
    </div>
    <nav class="sidebar-nav">
        <a href="{{ route('admin.form') }}" class="nav-item"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="{{ route('orders') }}" class="nav-item"><i class="fas fa-box"></i> Order</a>
        <a href="{{ route('products') }}" class="nav-item"><i class="fas fa-ice-cream"></i> Product</a>
    </nav>

    <!-- Tombol Logout -->
    <div class="sidebar-footer">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</aside>
    <!-- Main Content -->
    <div class="main-content">
        <header>
            <h2>Dashboard</h2>
            <div class="user-profile">
                <span>Dashboard</span>
                <i class="fas fa-user-circle"></i>
            </div>
        </header>
        <div class="container mt-5">
    <h1 class="text-center mb-4">Pesanan Terbaru</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID Pesanan</th>
                <th>Nama Pelanggan</th>
                <th>Tipe Pengiriman</th>
                <th>Kategori</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->user->name ?? 'Guest' }}</td>
                    <td>{{ ucfirst($order->tipe_pengiriman) }}</td>
                    <td>{{ $order->kategori }}</td>
                    <td>Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                    <td><span class="badge bg-warning">{{ ucfirst($order->status_pesanan) }}</span></td>
                    <td>
                        <form action="{{ route('admin.orders', $order->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Selesaikan</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada pesanan dengan status pending.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="scriptsadmin.js"></script>
</body>
</html>