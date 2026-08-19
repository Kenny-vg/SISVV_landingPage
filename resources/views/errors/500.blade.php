@extends('errors.layout')

@section('title', 'Error en el servidor')
@section('number')
    500
@endsection
@section('message', 'Algo salió mal en nuestro lado. Inténtalo de nuevo más tarde.')
