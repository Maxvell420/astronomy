<x-layout :styles="$styles" :title="$title">
    <div class="articleWrapper">
        <h2>
            {{$article->title}}
        </h2>
        <a href="{{$article->original}}" class="original">Оригинал</a>
        <div class="article">
            <img class="articleImg" src="/{{$article->picture->path}}/{{$article->picture->name}}" alt="{{$article->picture->title}}">
            <div class="articleText">
                <p>{{$article->content}}</p>
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
                    <button type="submit" class="button">Отправить </button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
<script>
    addArticleLikeEvent()
    addCommentsLikeEvent()
</script>
