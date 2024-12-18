<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
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
        <a href="{{ route('admin.completedOrders') }}" class="nav-item"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
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

        <!-- Stats Cards -->
        <div class="stats-cards">
            <div class="card">
                <i class="fas fa-exchange-alt"></i>
                <h3>7 Transaksi</h3>
                <p>Transaksi</p>
            </div>
            <div class="card">
                <i class="fas fa-users"></i>
                <h3>8 Pegawai</h3>
                <p>Employee</p>
            </div>
            <div class="card">
                <i class="fas fa-dollar-sign"></i>
                <h3>100.000</h3>
                <p>Earning</p>
            </div>
            <div class="card">
                <i class="fas fa-ice-cream"></i>
                <h3>8 Flavor</h3>
                <p>Ice Cream</p>
            </div>
        </div>
        <div class="container mt-5">
    </div>



    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="scriptsadmin.js"></script>
</body>
</html>