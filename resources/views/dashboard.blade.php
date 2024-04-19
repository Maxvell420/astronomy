<x-layout :styles="$styles">
    @foreach($articles as $article)
        <div class="preview">
            <a href="{{route('article.show',$article)}}">
                <img src="{{$article->picture->path}}/{{$article->picture->name}}" alt="{{$article->picture->title}}">
                <div>
                    <h2>
                        {{$article->title}}
                    </h2>
                    <div class="previewText">
                        {{$article->previewText}}
                    </div>
                    <div class="articleInfo">
                        <div>{{$article->created_at}}</div>
                        <div class="likes">Комментариев:{{$article->comments}} Лайков:{{$article->likes}}</div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
    {{$articles}}
</x-layout>
