@extends('plantilla')
@section('titulo', 'Recursos asignat editar')
@section('color_fons', "recurs")
@section('color-atras', 'recurs')
@section('boto_atras', './principal_recursos')
@section('container')
    <recursos-asignats ></recursos-asignats>
    {{-- :user_id="{{ Auth::user()->id }}" --}}
@endsection
