<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penjualan</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f4f6f8;
            color: #333;
            margin: 0;
            padding: 40px 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        h1 {
            color: #1e293b;
            margin-bottom: 4px;
        }

        .subtitle {
            color: #64748b;
            margin-bottom: 30px;
        }

        .stat-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            flex: 1;
            min-width: 180px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.06);
            border-left: 4px solid #3b82f6;
        }

        .stat-card h3 {
            margin: 0 0 8px 0;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #64748b;
        }

        .stat-card p {
            margin: 0;
            font-size: 22px;
            font-weight: 600;
            color: #1e293b;
        }

        h2 {
            color: #1e293b;
            font-size: 18px;
            margin-bottom: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.06);
        }

        thead {
            background-color: #3b82f6;
        }

        thead th {
            color: #fff;
            text-align: left;
            padding: 12px 16px;
            font-weight: 500;
        }

        tbody td {
            padding: 12px 16px;
            border-top: 1px solid #e2e8f0;
        }

        tbody tr:hover {
            background-color: #f8fafc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Laporan Penjualan</h1>
        <p class="subtitle">Periode: {{ $bulan }}</p>

        <div class="stat-grid">
            <div class="stat-card">
                <h3>Total Transaksi</h3>
                <p>{{ $statistik['total_transaksi'] }}</p>
            </div>
            <div class="stat-card">
                <h3>Total Pendapatan</h3>
                <p>Rp {{ number_format($statistik['total_pendapatan'], 0, ',', '.') }}</p>
            </div>
            <div class="stat-card">
                <h3>Produk Terlaris</h3>
                <p>{{ $statistik['produk_terlaris'] }}</p>
            </div>
            <div class="stat-card">
                <h3>Rata-rata per Transaksi</h3>
                <p>Rp {{ number_format($statistik['rata_rata_transaksi'], 0, ',', '.') }}</p>
            </div>
        </div>

        <h2>Penjualan per Kategori</h2>
        <table>
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Jumlah Transaksi</th>
                    <th>Pendapatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penjualanPerKategori as $item)
                    <tr>
                        <td>{{ $item['kategori'] }}</td>
                        <td>{{ $item['jumlah'] }}</td>
                        <td>Rp {{ number_format($item['pendapatan'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>