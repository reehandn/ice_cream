<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 30px;
        }
        #total-harga {
            font-size: 1.5rem;
            font-weight: 600;
            margin-top: 20px;
            color: rgb(53, 126, 198);
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #bdc3c7;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        #total-harga .value {
            font-size: 1.8rem;
            font-weight: 700;
            color: #e74c3c;
        }
        .form-label {
            font-weight: 600;
            color: #333;
        }
    </style>
</head>
<body>
<header class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid d-flex align-items-center">
        <div class="logo">
            <img src="{{ asset('asset/logooo.jpg') }}" alt="Logo" class="logo-image" style="height: 50px;">
        </div>
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <nav class="ms-auto">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('form') }}">Order</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<div class="container">
    <h2 class="mb-4 text-center">Form Pemesanan</h2>

    <!-- Tampilkan Error -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Pemesanan -->
    <form action="{{ route('form-store') }}" method="POST">
        @csrf

        <!-- Tipe Pengiriman -->
        <div class="mb-3">
            <label for="tipe_pengiriman" class="form-label">Tipe Pengiriman</label>
            <select name="tipe_pengiriman" id="tipe_pengiriman" class="form-control" required>
                <option value="pickup">Pickup</option>
                <option value="delivery">Delivery</option>
            </select>
        </div>

        <!-- Alamat Pengiriman -->
        <div class="mb-3" id="alamatPengirimanDiv" style="display: none;">
            <label for="alamat_pengiriman" class="form-label">Alamat Pengiriman</label>
            <input type="text" name="alamat_pengiriman" id="alamat_pengiriman" class="form-control" placeholder="Masukkan alamat pengiriman">
        </div>

        <!-- Kategori -->
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select name="kategori" id="kategori" class="form-control" required>
                <option value="Cone">Cone</option>
                <option value="Cup">Cup</option>
                <option value="Bread">Bread</option>
            </select>
        </div>

        <!-- Pilihan Jumlah Rasa -->
        <div class="mb-3">
            <label for="jumlah_rasa" class="form-label">Berapa rasa yang ingin Anda pilih?</label>
            <select id="jumlah_rasa" name="jumlah_rasa" class="form-control" required>
                <option value="1">1 Rasa</option>
                <option value="2">2 Rasa</option>
                <option value="3">3 Rasa</option>
            </select>
        </div>

        <!-- Pilihan Rasa -->
        <div id="pilihan-rasa-container"></div>

        <!-- Total Harga -->
        <div id="total-harga" class="mt-4">Total Harga: Rp 0</div>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary mt-4 w-100">Pesan</button>
    </form>
</div>

<script>
    const jumlahRasa = document.getElementById('jumlah_rasa');
    const pilihanRasaContainer = document.getElementById('pilihan-rasa-container');
    const totalHargaDiv = document.getElementById('total-harga');
    const tipePengiriman = document.getElementById('tipe_pengiriman');
    const alamatPengirimanDiv = document.getElementById('alamatPengirimanDiv');

    // Data rasa dari controller
    const rasas = @json($rasas);

    function generateRasaField(index) {
        let options = '<option value="">-- Pilih Rasa --</option>';
        rasas.forEach(rasa => {
            options += `<option value="${rasa.id}" data-harga="${rasa.harga}">${rasa.nama_rasa} - Rp ${parseInt(rasa.harga).toLocaleString('id-ID')}</option>`;
        });

        return `
            <div class="mb-3">
                <label for="rasa${index}" class="form-label">Pilih Rasa ${index}</label>
                <select id="rasa${index}" name="rasa[]" class="form-control" onchange="updateTotalHarga()">
                    ${options}
                </select>
            </div>
        `;
    }

    jumlahRasa.addEventListener('change', function () {
        const jumlah = parseInt(this.value);
        pilihanRasaContainer.innerHTML = '';
        for (let i = 1; i <= jumlah; i++) {
            pilihanRasaContainer.insertAdjacentHTML('beforeend', generateRasaField(i));
        }
        updateTotalHarga();
    });

    function updateTotalHarga() {
        let totalHarga = 0;
        document.querySelectorAll('#pilihan-rasa-container select').forEach(select => {
            const harga = parseInt(select.selectedOptions[0]?.dataset.harga || 0);
            totalHarga += harga;
        });
        totalHargaDiv.textContent = `Total Harga: Rp ${totalHarga.toLocaleString('id-ID')}`;
    }

    // Toggle input alamat pengiriman
    tipePengiriman.addEventListener('change', function () {
        alamatPengirimanDiv.style.display = this.value === 'delivery' ? 'block' : 'none';
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
