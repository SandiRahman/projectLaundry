@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Owner</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Id</th>
                <th>Tanggal Pemesanan</th>
                <th>Tanggal Bayar</th>
                <th>Status</th>
                <th>Nama Paket</th>
            </tr>
        </thead>
    </table>
    <a href="{{ route('owner.logout') }}" 
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
       Logout
    </a>
    <form id="logout-form" action="{{ route('owner.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

@endsection
