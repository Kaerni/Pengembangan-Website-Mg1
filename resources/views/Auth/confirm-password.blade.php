@extends('layouts.app')

@section('title', 'Konfirmasi Password')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card p-4">
            <h2 class="mb-3">Konfirmasi Password</h2>
            <p>Masukkan password untuk melanjutkan.</p>

            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <form action="{{ route('password.confirm') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" name="password" type="password" class="form-control" required autofocus>
                </div>
                <button type="submit" class="btn btn-primary w-100">Konfirmasi</button>
            </form>
        </div>
    </div>
</div>
@endsection