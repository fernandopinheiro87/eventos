@extends('layouts.main')

@section('title','Produto')

@section('content')
    

    @if($busca != null)
        <p>o usuario esta buscando {{$busca}}</p>
    @endif
@endsection