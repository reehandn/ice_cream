<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Stok - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
 <!-- Link ke file CSS eksternal -->
    <style>
        .hidden { display: none; }
    </style>
</head>
<body>

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
        <header class="d-flex justify-content-between align-items-center">
            <h2>Manajemen Stok Produk</h2>
            <div class="user-profile">
                <span>Admin</span>
                <i class="fas fa-user-circle"></i>
            </div>
        </header>

        <div class="container mt-5">
    <h2 class="mb-4">Manajemen Stok Produk</h2>

    <!-- Form Tambah Produk -->
    <form action="{{ route('products.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="nama_rasa" class="form-control" placeholder="Nama Rasa" required>
            </div>
            <div class="col-md-3">
                <input type="number" name="stok" class="form-control" placeholder="Stok" required>
            </div>
            <div class="col-md-3">
                <input type="number" name="harga" class="form-control" placeholder="Harga" required>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </form>

    <!-- Tabel Produk -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Rasa</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($rasas as $rasa)
                <tr>
                    <td>{{ $rasa->id }}</td>
                    <td>{{ $rasa->nama_rasa }}</td>
                    <td>{{ $rasa->stok }}</td>
                    <td>Rp {{ number_format($rasa->harga, 0, ',', '.') }}</td>
                    <td>
                        <!-- Form Update -->
                        <form action="{{ route('products.update', $rasa->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <input type="number" name="stok" value="{{ $rasa->stok }}" class="form-control d-inline w-25" required>
                            <input type="number" name="harga" value="{{ $rasa->harga }}" class="form-control d-inline w-25" required>
                            <button type="submit" class="btn btn-success btn-sm">Update</button>
                        </form>

                        <!-- Form Delete -->
                        <form action="{{ route('products.delete', $rasa->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus produk ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data produk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


    <!-- JavaScript -->
    <script>
        function showUpdateForm(product) {
            // Get current values for the selected product
            let stock = document.getElementById(`${product}Stock`).textContent;
            let price = document.getElementById(`${product}Price`).textContent;

            // Show the update form
            document.getElementById('updateForm').classList.remove('hidden');

            // Fill in the form with the current values
            document.getElementById('productName').value = product.charAt(0).toUpperCase() + product.slice(1);
            document.getElementById('stock').value = stock;
            document.getElementById('price').value = price;
        }

        function hideUpdateForm() {
            // Hide the update form
            document.getElementById('updateForm').classList.add('hidden');
        }

        // Handle form submission for updating
        document.getElementById('updateFormDetails').addEventListener('submit', function(event) {
            event.preventDefault();

            // Get the values from the form
            let productName = document.getElementById('productName').value.toLowerCase();
            let stock = document.getElementById('stock').value;
            let price = document.getElementById('price').value;

            // Update the table with new values
            document.getElementById(`${productName}Stock`).textContent = stock;
            document.getElementById(`${productName}Price`).textContent = price;

            // Hide the form after updating
            hideUpdateForm();
        });
    </script>

</body>
</html>
