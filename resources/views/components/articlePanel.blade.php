<div data-like="{{$article->like}}" class="panel">
    <span>{{$likes}}</span>
    <form>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <button @guest disabled @endguest>
            @if($liked)
                <img src="{{asset('images/buttons/heart-remove.svg')}}" alt="like  remove">
            @else
                <img src="{{asset('images/buttons/heart.svg')}}" alt="like">
            @endif
        </button>
    </form>
    <span>{{$comments}}</span>
</div>
