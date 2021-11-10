@extends('layout.template')
@section('title', 'Home')

@section('content')
    <div class="box">
        <div class="box-header">
            <b>DATA AKUN</b>
        </div>
        <div class="box-body">
            <p><b>Nama :</b> {{ Auth::user()->name }}</p>
            <p><b>Email :</b> {{ Auth::user()->email }}</p>
        </div>
    </div>
@endsection