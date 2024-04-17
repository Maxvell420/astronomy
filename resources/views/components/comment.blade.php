<div class="comment" data-href="{{$comment->like}}">
    <div>
        <p>
            Пользователь: {{$comment->user->name}}
        </p>
        <form>
            {{$comment->likes}}
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <button @guest disabled @endguest>
                @if($comment->liked)
                    <img src="{{asset('images/buttons/heart-remove.svg')}}" alt="like  remove">
                @else
                    <img src="{{asset('images/buttons/heart.svg')}}" alt="like">
                @endif
            </button>
        </form>
    </div>
    <p>
        {{$comment->text}}
    </p>
    <p>
        {{$comment->created_at}}
    </p>
</div>
