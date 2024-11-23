@extends('layouts.layout')

@section('title', 'Просмотр')

@section('content')
    <h2>Просмотр категории: {{ $product->name }}</h2>
    <div class="grid">

        <div>
            {{ $product->name }} - {{ $product->description }} - {{ $product->price }} - {{ $product->quantity }} - {{ $product->discount }}
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

    </div>
    <div>
        @if($product->photos->isNotEmpty())
            @foreach($product->photos as $photo)
                <img src="{{ asset('storage/' . $photo->path) }}" alt="{{$product->name}}" style="width: 150px;"
            @endforeach


        @endif
    </div>


@endsection
