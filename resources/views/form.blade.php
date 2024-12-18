<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Es Krim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/styleform.css">
    <style>
        body {
            font-family: 'Raleway', sans-serif;
        }
        .input-group-text {
            width: 3rem;
            text-align: center;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
<header class="navbar navbar-expand-lg">
    <div class="container-fluid d-flex align-items-center">
        <div class="logo">
            <img src="asset/logooo.jpg" alt="Logo" class="logo-image" width="50">
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
                        <a class="nav-link" href="{{ route('form') }}">Order</a>
                    </li>
                    <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout"> Logout </button>
                    </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<div class="container mt-5">
    <h1 class="text-center mb-4">Form Pemesanan Es Krim</h1>

    <form action="{{ route('form-store') }}" method="POST" id="order-form">
        @csrf
        <!-- Detail Pesanan -->
        <div class="mb-4">
            <h3><i class="fas fa-receipt"></i> Detail Pesanan</h3>

            <!-- Pilihan Pengiriman -->
            <div class="mb-3">
                <label for="delivery-type" class="form-label">Pilih Pengiriman</label>
                <select class="form-select" id="delivery-type" name="delivery_type" required>
                    <option value="pickup">Pickup (Ambil Sendiri)</option>
                    <option value="delivery">Delivery (Antar ke Rumah)</option>
                </select>
            </div>

            <!-- Alamat Pengiriman -->
            <div id="delivery-options" class="hidden">
                <label class="form-label">Alamat Pengiriman</label>
                <input type="text" class="form-control" name="delivery_address" placeholder="Alamat lengkap">
            </div>
            <div class="mb-3">
                <label for="number-of-preferences" class="form-label">Pilih Kategori!</label>
                <select class="form-select" id="number-of-preferences" name="number_of_preferences" required>
                    <option value="1">Cone</option>
                    <option value="2">Cup</option>
                    <option value="3">Bread</option>
                </select>
            </div>

<!-- Pilih Jumlah Rasa -->
<select class="form-select" id="number-of-flavors" name="number_of_flavors" required>
    <option value="1">1 Rasa</option>
    <option value="2">2 Rasa</option>
    <option value="3">3 Rasa</option>
</select>

<!-- Area Rasa akan di-generate secara dinamis -->
<div id="flavor-section" class="mb-4"></div>

<div class="mb-3">
    <label class="form-label">Pilih Topping</label>
    @foreach($toppings as $topping)
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="toppings[]" value="{{ $topping->id }}">
            <label class="form-check-label">{{ $topping->topping }}</label>
        </div>
    @endforeach
</div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">Submit Order</button>
            </form>
        </div>

<script>

        function showFlavorFields() {
            let jumlahRasa = document.getElementById('number-of-flavors').value;  // Ganti id dari 'jumlah_rasa' menjadi 'number-of-flavors'
            document.getElementById('rasa2').classList.toggle('hidden', jumlahRasa < 2);
            document.getElementById('rasa3').classList.toggle('hidden', jumlahRasa < 3);
        }

        document.addEventListener('DOMContentLoaded', function() {
            showFlavorFields();
        });
        
    // Toggle alamat pengiriman
    document.getElementById('delivery-type').addEventListener('change', function () {
        const deliveryOptions = document.getElementById('delivery-options');
        deliveryOptions.classList.toggle('hidden', this.value !== 'delivery');
    });

    document.getElementById('number-of-flavors').addEventListener('change', function () {
    const flavorSection = document.getElementById('flavor-section');
    const numFlavors = parseInt(this.value);
    flavorSection.innerHTML = ''; // Reset pilihan rasa

    // Data rasa dari controller
    const rasas = @json($rasas);

    for (let i = 1; i <= numFlavors; i++) {
        let options = '';
        rasas.forEach(rasa => {
            options += `<option value="${rasa.id}">${rasa.nama_rasa}</option>`;
        });

        flavorSection.innerHTML += `
            <div class="mb-3">
                <label class="form-label">Pilih Rasa ${i}</label>
                <select class="form-select" name="flavors[]" required>
                    ${options}
                </select>
            </div>
        `;
    }
});

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
