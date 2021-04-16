@extends('plantilla')
@section('titulo', 'Recursos asignat editar')
@section('color_fons', "recurs")
@section('color-atras', 'recurs')
@section('boto_atras', './principal_recursos')
@section('container')
    <recursos-consultar ></recursos-consultar>
    {{-- :user_id="{{ Auth::user()->id }}" --}}
@endsection


