<x-content>
    <div class="wrapper">
        <h2>
            {{$article->title}}
        </h2>
        <div class="article">
            <img src="/{{$article->picture->path}}/{{$article->picture->name}}" alt="{{$article->picture->title}}">
            <p>
                {{$article->content}}
            </p>
        </div>
        <div class="comments">
            <div class="newComment">
                <form action="{{route('comment.store',$article)}}" method="post">
                    @csrf
                    <label>
                        <textarea name="text" placeholder="new comment..."></textarea>
                    </label>
                    <input type="submit">
                </form>
            </div>
            <div>
                @foreach($article->comments->sortBy('updated_at') as $comment)
                    <div class="comment">
                        <p>
                            User: {{$comment->user->name}}
                        </p>
                        <p>
                            {{$comment->text}}
                        </p>
                        <p>
                            {{$comment->created_at}}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-content>
