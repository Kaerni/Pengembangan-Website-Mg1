<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validasi Huruf Kapital</title>
</head>
<body>
    <h2>Validasi Nama</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @error('nama')
        <p style="color: red;">{{ $message }}</p>
    @enderror

    <form action="{{ route('uppercase.submit') }}" method="post">
        @csrf

        <label for="nama">Nama:</label>
        <input id="nama" type="text" name="nama" value="{{ old('nama') }}" required>

        <button type="submit">Validasi</button>
    </form>
</body>
</html>