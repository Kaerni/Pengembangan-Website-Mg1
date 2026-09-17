@extends('layouts.admin')

@section('title', 'Kelola User')

@section('content')

    <h1>Kelola User</h1>

    @if($users->count() > 0)

        <table border="1" cellpadding="10">

            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
            </tr>

            @foreach($users as $user)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                </tr>

            @endforeach

        </table>

    @else

        <p>Belum ada user.</p>

    @endif

@endsection