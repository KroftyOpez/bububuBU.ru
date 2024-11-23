<form action="{{ $action }}" method="post" enctype="multipart/form-data">
    @csrf
    @if($method !== 'post')
        @method($method)
    @endif

    <div>
        @error('name')
        <p class="warning">{{$message}}</p>
        @enderror
        <label for="product_name">Наименование товара</label>
        <input id="product_name" type="text" name="name" value="{{ $product->name ?? old('name') }}">
    </div>
    <div>
        @error('description')
        <p class="warning">{{$message}}</p>
        @enderror
        <label for="product_description">Описание товара</label>
        <input id="product_description" type="text" name="description" value="{{ $product->description ?? old('description') }}">
    </div>
    <div>
        @error('price')
        <p class="warning">{{$message}}</p>
        @enderror
        <label for="product_price">Цена товара</label>
        <input id="product_price" type="number" min="0.01" step="0.01" name="price" value="{{ $product->price ?? old('price') }}">
    </div>
    <div>
        @error('quantity')
        <p class="warning">{{$message}}</p>
        @enderror
        <label for="product_quantity">Количество товара</label>
        <input id="product_quantity" type="number" min="0" step="1" name="quantity" value="{{ $product->quantity ?? old('quantity') }}">
    </div>
    <div>
        @error('discount')
        <p class="warning">{{$message}}</p>
        @enderror
        <label for="product_discount">Скидка на товар</label>
        <input id="product_discount" type="number" min="0" max="99" step="1" name="discount" value="{{ $product->discount ?? old('discount') }}">
    </div>
    <!-- Категория -->
    <div>
        @error('category_id')
        <p class="warning">{{$message}}</p>
        @enderror
        <label for="product_category">Категория товара</label>

        <select id="product_category" name="category_id">
            @foreach($categories as $category)
                <option value="{{$category->id}}"
                    {{ (isset($product) && $product->category->id == $category->id) || old('category_id') == $category->id ? 'selected' : ''}}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <!-- Фото -->
    <div>
        @error('photos.*')
        <p class="warning">{{$message}}</p>
        @enderror
        <label for="product_photos">Выберите фотографии товара</label>
        <input id="product_photos" type="file" name="photos[]"  accept="image/jpeg,image/png,image/svg+xml" multiple>
    </div>

    <div>
        <button class="btn" title="Сохранить">Сохранить</button>
    </div>

</form>
