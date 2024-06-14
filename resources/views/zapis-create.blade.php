@include('header')
<section class="main">
    <div class="container">

        <form action="/zapis/store" method="post">
            @csrf

            <h2 class="title">Сформировать заявку</h2>

            <div class="input">
                <select name="product_id">
                    <option selected disabled value="">Выберите продукт</option>
                    @foreach($products as $item)
                        <option @if(old('product_id') == $item->id) selected
                                @endif value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('product_id')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="input">
                <input name="address" placeholder="Адрес" value="{{old('address')}}">
                @error('address')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="input">
                <input type="number" name="quantity" placeholder="Количество" value="{{old('quantity')}}">
                @error('quantity')
                <p class="error">{{$message}}</p>
                @enderror
            </div>

            <button>Заказать</button>
        </form>
    </div>
</section>
@include('footer')
