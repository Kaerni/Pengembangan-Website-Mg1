@extends('layouts.app')

@section('title', 'Kategori Produk')

@section('content')
<h2>Kategori Produk</h2>

@if ($categories->isEmpty())
    <p class="text-muted">Belum ada kategori yang tersedia.</p>
@else
    <table class="table table-striped align-middle">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Slug</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection