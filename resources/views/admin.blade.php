<x-content>
    <div class="wrapper">
        <h2>
            Панель управления
        </h2>
            <a href="{{route('parser')}}"><div class="button_parser">Запустить парсер</div></a>
        <div class="articles">
            @foreach($articles as $article)
                <div class="admin_row">
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
                    <div class="preview_buttons">
                        <form action="{{route('article.edit',$article)}}">
                            <button class="edit">Редактировать</button>
                        </form>
                        <form action="{{route('article.cancel',$article)}}" method="post">
                            <button class="delete">Удалить</button>
                            @csrf
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        {{$articles}}
    </div>
</x-content>
<script>
    appendArticleCreateButton("{{route('article.create')}}")
</script>
