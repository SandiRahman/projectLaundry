@extends('layouts.app')

@section('content')
    <h1>Welcome to Admin Dashboard</h1>
    <p>Only accessible by users with the 'admin' role.</p>
    <a href="{{ route('login') }}" class="btn btn-sm btn-danger">Logout</a>

    <h3>Registrasi</h3>
@endsection
