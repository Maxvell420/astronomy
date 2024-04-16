<x-content>
    @foreach($articles as $article)
        <div class="preview">
            <a href="{{route('article.show',$article)}}">
                <img src="{{$article->picture->path}}/{{$article->picture->name}}" alt="{{$article->picture->title}}">
            <h2>
                    {{$article->title}}
            </h2>
            </a>
        </div>
    @endforeach
    {{$articles}}
</x-content>
