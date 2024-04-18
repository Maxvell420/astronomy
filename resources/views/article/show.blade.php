<x-content>
    <div class="articleWrapper">
        <h2>
            {{$article->title}}
        </h2>
        <a href="{{$article->original}}" class="original">Оригинал</a>
        <div class="article">
            <div class="articleImg">
                <img src="/{{$article->picture->path}}/{{$article->picture->name}}" alt="{{$article->picture->title}}">
            </div>
            <div class="articleText">
                {{$article->content}}
                <x-articlePanel :liked="$liked" :likes="$likes" :comments="$commentsNumber" :article="$article"/>
            </div>
        </div>
        <div class="comments">
                @foreach($comments as $comment)
                    <x-comment :comment="$comment"/>
                @endforeach
            <div class="newComment">
                <form action="{{route('comment.store',$article)}}" method="post">
                    @csrf
                    <textarea id="newComment" name="text" placeholder="Новый комментарий..."></textarea>
                    <button type="submit">Отправить </button>
                </form>
            </div>
        </div>
    </div>
</x-content>
<script>
    addArticleLikeEvent()
    addCommentsLikeEvent()
</script>
