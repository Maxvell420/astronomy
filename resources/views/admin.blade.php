<x-layout :styles="$styles">
        <h2>
            Панель управления
        </h2>
        <div class="adminPanel">
            <form action="{{route('parser')}}" method="post">
                <span>Запустить парсер сайта:</span>
                <select name="parser">
                    <option value="0">Lenta.ru</option>
                    <option value="1">Astronews.ru</option>
                </select>
                @csrf
                <button>Запустить парсер</button>
            </form>
        </div>
            @foreach($articles as $article)
                    <div class="preview">
                        <a href="{{route('article.show',$article)}}">
                            <div>
                                <img src="{{$article->picture->path}}/{{$article->picture->name}}" alt="{{$article->picture->title}}">
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
<script>
    appendArticleCreateButton("{{route('article.create')}}")
</script>
