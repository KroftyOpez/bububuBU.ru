@extends('layouts.layout')

@section('title', 'Добавление товара')

@section('content')
    <h2>Добавление товара</h2>
    @include('products.form', ['action'=> route('products.store'), 'method' => 'post'])
@endsection
