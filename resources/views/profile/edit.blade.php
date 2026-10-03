@extends('layouts.app')

@section('title', 'Profil Akun')

@section('content')
<h2>Profil Akun</h2>

@if (session('status') === 'profile-updated')
    <div class="alert alert-success">Profil berhasil diperbarui.</div>
@endif

<form action="{{ route('profile.update') }}" method="POST" class="mb-5">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required>
        @error('name') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        @error('email') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>

<hr>
<h3>Hapus Akun</h3>
<p>Masukkan password untuk mengonfirmasi penghapusan akun.</p>
<form action="{{ route('profile.destroy') }}" method="POST">
    @csrf
    @method('DELETE')
    <div class="mb-3">
        <label for="delete_password" class="form-label">Password</label>
        <input id="delete_password" name="password" type="password" class="form-control" required>
        @error('password', 'userDeletion') <div class="text-danger">{{ $message }}</div> @enderror
    </div>
    <button type="submit" class="btn btn-danger">Hapus Akun</button>
</form>
@endsection