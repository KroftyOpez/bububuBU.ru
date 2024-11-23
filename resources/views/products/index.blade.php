@extends('layouts.layout')

@section('title', 'Товары')

@section('content')
    <h2>Товаров</h2>
    <a class="btn" href="{{ route('products.create') }}">Добавить товар</a>
    <div class="grid grid-product">
        @foreach($products as $product)
            <div>
                {{ $product->name }}
            </div>
            <div>
                {{ $product->description }}
            </div>
            <div>
                {{ $product->price }}
            </div>
            <div>
                {{ $product->quantity }}
            </div>
            <div>
                {{ $product->discount }}
            </div>
            <div>
                {{ $product->category->name }}
            </div>
            <div>
                @if($product->photos->isNotEmpty())
                    <img src="{{ asset('storage/' . $product->photos->first()->path) }}" alt="{{$product->name}}" style="width: 150px;"

                @endif
            </div>
            <div>
                <a href="{{ route('products.show', $product->id) }}" title="Посмотреть">
                    <img class="w25" src="{{ asset('assets/images/show.png') }}" alt="Посмотреть" />
                </a>
            </div>
            <div>
                <a href="{{ route('products.edit', $product->id) }}" title="Редактировать">
                    <img class="w25" src="{{ asset('assets/images/edit.png') }}" alt="Редактировать" />
                </a>
            </div>
            <div>
                <form action="{{ route('products.destroy', $product->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="delete" type="submit" title="Удалить">
                        <img class="w25" src="{{ asset('assets/images/delete.png') }}" alt="Редактировать" />
                    </button>
                </form>
            </div>
        @endforeach
    </div>


@endsection

