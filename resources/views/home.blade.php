@extends('master')

@section('konten')
  <h4>Selamat Datang <b>{{Auth::users()->name}}</b>, Anda Login sebagai <b>{{Auth::users()->role}}</b>.</h4>
@endsection
