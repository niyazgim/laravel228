@include('header')
<section class="main">
    <div class="container">
        <form action="/register" method="post">
            @csrf

            <h2 class="title">Регистрация</h2>

            <div class="input">
                <input type="text" name="name" placeholder="Имя" value="{{old('name')}}">
                @error('name')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="input">
                <input type="text" name="surname" placeholder="Фамилия" value="{{old('surname')}}">
                @error('surname')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="input">
                <input type="text" name="patronymic" placeholder="Отчество" value="{{old('patronymic')}}">
                @error('patronymic')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="input">
                <input type="text" name="login" placeholder="Логин" value="{{old('login')}}">
                @error('login')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="input">
                <input type="number" name="phone" placeholder="Телефон" value="{{old('phone')}}">
                @error('phone')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="input">
                <input type="password" name="password" placeholder="Пароль">
                @error('password')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="input">
                <input type="password" name="password_confirmation" placeholder="Пароль повторно">
            </div>

            <button>Зарегистрироваться</button>
        </form>
    </div>
</section>
@include('footer')
