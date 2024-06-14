@include('header')
<section class="main">
    <div class="container">

        <form action="/login" method="post">
            @csrf

            <h2 class="title">Вход</h2>

            <div class="input">
                <input type="text" name="login" placeholder="Логин" value="{{old('login')}}">
                @error('login')
                <p class="error">{{$message}}</p>
                @enderror
            </div>
            <div class="input">
                <input type="password" name="password" placeholder="Пароль">
                @error('password')
                <p class="error">{{$message}}</p>
                @enderror
            </div>

            <button>Войти</button>
        </form>
    </div>
</section>
@include('footer')
