@include('header')
<section class="main">
    <div class="container">
        <h1 class="main_title">Заявки</h1>
        @if(isset($zapises) && count($zapises) > 0)
            <div class="zapis_wrapper">
                @foreach($zapises as $item)
                    <div class="zapis">
                        <p class="zapis_status">{{$item->status->name}}</p>
                        <p class="zapis_info">{{$item->address}}</p>
                        <p class="zapis_info">{{$item->quantity}}</p>
                        <p class="zapis_info">{{$item->product->name}}</p>
                        @if(auth()->user()->role_id == 2 && $item->status_id == 1)
                            <form action="/zapis/{{$item->id}}/update" method="post">
                                @csrf
                                <input type="hidden" name="status_id" value="2">
                                <button>Принять</button>
                            </form>
                            <form action="/zapis/{{$item->id}}/update" method="post">
                                @csrf
                                <input type="hidden" name="status_id" value="3">
                                <button>Отклонить</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <h2 class="title">У Вас нет заявок</h2>
        @endif
    </div>
</section>
@include('footer')
