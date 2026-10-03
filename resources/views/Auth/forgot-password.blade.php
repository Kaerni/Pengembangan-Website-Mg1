@extends('layouts.app')

@section('title', 'Lupa Password')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card p-4">
            <h2 class="mb-3">Lupa Password</h2>
            <p>Masukkan email akun untuk menerima tautan reset password.</p>

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}" required autofocus>
                </div>
                <button type="submit" class="btn btn-primary w-100">Kirim Tautan Reset</button>
            </form>

            <a href="{{ route('login') }}" class="mt-3 text-center">Kembali ke login</a>
        </div>
    </div>
</div>
@endsection