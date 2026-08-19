@extends('errors.layout')

@section('title', 'Acceso restringido')
@section('number')
    403
@endsection
@section('message', 'No tienes permisos para ver esta sección. Si crees que esto es un error, contacta al administrador.')
