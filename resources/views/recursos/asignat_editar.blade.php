@extends('plantilla')
@section('titulo', 'SEMS - Recurs Incidencia')
@section('color_fons', "recurs")
@section('color-atras', 'recurs')
@section('boto_atras', './principal_recursos')
@section('container')

<recursos-asignats :user_id="{{ Auth::user()->id }}"></recursos-asignats>
{{-- :user_id="{{ Auth::user()->id }}" --}}
@endsection
