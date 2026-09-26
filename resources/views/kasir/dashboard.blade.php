<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard POS Toko Kelontong</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="card shadow-sm p-4">
            <h2 class="mb-3">Sistem Point of Sale (POS) - Toko Mandiri</h2>
            <hr>
            <h4>Selamat Datang, <strong>{{ $nama_pegawai }}</strong>!</h4>
            <p class="text-muted">Status Shift Anda hari ini: <strong>{{ $shift }}</strong></p>

            <div class="alert alert-info mt-4">
                <h5>Menu Cepat:</h5>
                <ul>
                    <li>Kasir Aktif: Jam Operasional Terpantau</li>
                    <li>Jumlah Transaksi Hari Ini: 0</li>
                </ul>
            </div>
            
            <a href="{{ url('/produk-toko') }}" class="btn btn-primary mt-2">Lihat Daftar Produk Toko</a>
        </div>
        <footer class="mt-4 text-center text-secondary">
            <small>&copy; 2026 POS Toko Kelontong - Praktikum Pemrograman Web</small>
        </footer>
    </div>
</body>
</html>