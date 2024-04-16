<div class="header">
    <div class="buttons">
        <div class="button">
            <a href="{{route("dashboard")}}">Main menu</a>
        </div>
        <div class="button">
            @if(auth()->check() && auth()->user()->role_id == 2)
                <a href="{{ route('admin') }}">Admin Dashboard</a>
            @endif
            @guest
                <a href="{{route('sign')}}">Sign Up</a>
            @endguest
        </div>
        <div class="button">
            @if(!auth()->check())
                <a href="{{route('login')}}">login</a>
            @else
                <a href="{{route('logout')}}">logout</a>
            @endif
        </div>
    </div>
</div>
