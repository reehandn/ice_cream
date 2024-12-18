<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styleform.css">
    <style>
 
        /* Box styling */
        .box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Heading Terima Kasih */
        .text-success {
            color: #42a4e1 !important; /* Warna biru */
        }

        /* Tabel */
        .table {
            background: white;
        }

        .table th {
            text-align: center;
        }

        .table td {
            vertical-align: middle;
        }

        /* Tombol */
        .btn-primary {
            background-color: #42a4e1;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0077b6;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
    </style>
</head>
<body>
<header class="navbar navbar-expand-lg">
    <div class="container-fluid d-flex align-items-center">
        <div class="logo">
            <img src="asset/logooo.jpg" alt="Logo" class="logo-image">
        </div>
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <nav class="ms-auto">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('form') }}">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('history') }}">History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

    <div class="container mt-5">
        <div class="box text-center">
            <h1 class="text-success">Terima Kasih!</h1>
            <p>Pesanan Anda telah berhasil kami terima. Silakan cek status pesanan Anda di bawah.</p>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('user') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Kembali ke Home</a>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Simulasi data pesanan
            const orders = [
                { id: 1, name: "Es Krim Vanilla", status: "Siap Diambil" },
                { id: 2, name: "Es Krim Cokelat", status: "Siap Diambil" },
                { id: 3, name: "Es Krim Stroberi", status: "Diproses" }
            ];

            const orderStatusTable = document.getElementById("order-status-table");

            // Fungsi untuk memperbarui tabel status
            const updateTable = () => {
                orderStatusTable.innerHTML = ""; // Kosongkan tabel
                orders.forEach((order, index) => {
                    const statusIcon =
                        order.status === "Siap Diambil"
                            ? <i class="fas fa-check-circle text-success"></i>
                            : <i class="fas fa-hourglass-half text-warning"></i>;
                    const actionButton =
                        order.status === "Siap Diambil"
                            ? <button class="btn btn-success btn-sm"><i class="fas fa-box"></i> Ambil Pesanan</button>
                            : <button class="btn btn-secondary btn-sm" disabled><i class="fas fa-spinner"></i> Tunggu</button>;
                    const row = `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${order.name}</td>
                            <td class="text-center">${statusIcon} ${order.status}</td>
                            <td class="text-center">${actionButton}</td>
                        </tr>
                    `;
                    orderStatusTable.innerHTML += row;
                });
            };

            // Simulasi perubahan status pesanan setelah 5 detik
            setTimeout(() => {
                orders[2].status = "Siap Diambil";
                updateTable();
            }, 5000);

            updateTable(); // Tampilkan tabel awal
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>