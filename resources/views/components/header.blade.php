<div class="header">
    <div class="buttons">
        <div class="button @if(URL::full() === route("dashboard")) active @endif">
            <a href="{{route("dashboard")}}">Все новости</a>
        </div>
        <div class="button @if(URL::full() === route('admin') or (URL::full() === route('sign'))) active @endif">
            @if(auth()->check() && auth()->user()->role_id == 2)
                <a href="{{ route('admin') }}">Админка</a>
            @endif
            @guest
                <a href="{{route('sign')}}">Регистрация</a>
            @endguest
        </div>
        <div class="button @if(URL::full() === route('login') or (URL::full() === route('logout'))) active @endif">
            @if(!auth()->check())
                <a href="{{route('login')}}">Вход</a>
            @else
                <a href="{{route('logout')}}">Выход</a>
            @endif
        </div>
    </div>
</div>
