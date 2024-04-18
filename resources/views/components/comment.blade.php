<div class="comment" data-href="{{$comment->like}}">
    <div class="commentPanel">
        <div>
            <p>
                {{$comment->user->name}}
            </p>
        </div>
        <form class="invisible">
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
    <div>
        <p>
            {{$comment->text}}
        </p>
    </div>
    <div>
        <p>
            {{$comment->created_at}}
        </p>
        <p>
            Лайков: {{$comment->likes}}
        </p>
    </div>
</div>
