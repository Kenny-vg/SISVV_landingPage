@extends('errors.layout')

@section('title', 'Demasiadas solicitudes')
@section('number')
    429
@endsection
@section('message', 'Has enviado demasiadas solicitudes en poco tiempo. Inténtalo de nuevo en un momento.')
