<x-content>
    <div class="wrapper">
        <h2>
            {{$article->title}}
        </h2>
        <div class="article">
            <img src="/{{$article->picture->path}}/{{$article->picture->name}}" alt="{{$article->picture->title}}">
            <x-articlePanel :liked="$liked" :likes="$likes" :comments="$commentsNumber" :article="$article"/>
            <p>
                {{$article->content}}
            </p>
        </div>
        <div class="comments">
                @foreach($comments as $comment)
                    <x-comment :comment="$comment"/>
                @endforeach
            <div class="newComment">
                <form action="{{route('comment.store',$article)}}" method="post">
                    @csrf
                    <label>
                        <textarea name="text" placeholder="new comment..."></textarea>
                    </label>
                    <input type="submit">
                </form>
            </div>
        </div>
    </div>
</x-content>
<script>
    addArticleLikeEvent()
    addCommentsLikeEvent()
</script>
