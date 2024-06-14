@include('header')
<section class="main">
    <div class="container">

        <form action="/zapis/store" method="post">
            @csrf

            <h2 class="title">Сформировать заявку</h2>

            <div class="input">
                <select name="car_id">
                    <option selected disabled value="">Выберите продукт</option>
                    @foreach($cars as $item)
                        <option @if(old('car_id') == $item->id) selected
                                @endif value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('car_id')
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
