@extends('layouts.layout')

@section('title', 'Редактирование товара')

@section('content')
    <h2>Редактирование товара</h2>
    @include('products.form', ['action'=> route('products.update', $product->id), 'method' => 'put'])
@endsection
