<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Validasi Lengkap</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .alert-danger { background: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px; border-radius: 4px; }
        .alert-success { background: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border-radius: 4px; }
        .form-group { margin-bottom: 12px; }
        label { display: block; font-weight: bold; }
        input { padding: 8px; width: 300px; }
    </style>
</head>
<body>

    <h2>Form Input User</h2>

    @if (session('status'))
        <div class="alert-success">{{ session('status') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert-danger">
            <strong>Terjadi kesalahan input:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/validate-test" method="POST">
        @csrf

        <div class="form-group">
            <label>Nama (Wajib Kapital Semua):</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="text" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="password">
        </div>

        <div class="form-group">
            <label>Konfirmasi Password:</label>
            <input type="password" name="password_confirmation">
        </div>

        <div class="form-group">
            <label>Umur (Opsional, min 17):</label>
            <input type="number" name="age" value="{{ old('age') }}">
        </div>

        <button type="submit">Kirim Data</button>
    </form>

</body>
</html>