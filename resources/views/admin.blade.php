<x-content>
    <div class="wrapper">

        <h2>
            Astronomy news previews
        </h2>
            <a href="{{route('parser')}}"><div class="button_parser">Запустить парсер</div></a>
        <table>
            @foreach($articles as $article)
                <tr class="admin_row">
                    <td>
                        <div class="preview">
                            <a href="{{route('article.show',$article)}}">
                                <img src="{{$article->picture->path}}/{{$article->picture->name}}" alt="{{$article->picture->title}}">
                                <h2>
                                    {{$article->title}}
                                </h2>
                            </a>
                        </div>
                    </td>
                    <td class="preview_buttons">
                        <a href="{{route('article.create')}}">
                            <div class="create">
                                new Article
                            </div>
                        </a>
                        <a href="{{route('article.edit',$article)}}">
                            <div class="edit">
                                edit article
                            </div>
                        </a>
                        <form action="{{route('article.cancel',$article)}}" method="post">
                            @csrf
                            <input class="delete" type="submit" value="delete article">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$articles}}
    </div>
</x-content>
