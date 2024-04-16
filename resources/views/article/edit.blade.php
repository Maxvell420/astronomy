<x-content>
    <div class="form">
        <h4 style="margin: 10px;padding: 10px">
            Edit Article: {{$article->title}}
        </h4>
        <form action="{{route('article.update',[$article])}}" method="post" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td>
                        Title
                    </td>
                    <td>
                        <label>
                            <input type="text" name="title" value="{{old('title')??$article->title}}">
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        Content of Article
                    </td>
                    <td>
                        <label>
                            <textarea style="margin: 10px;    width: 800px;height: 200px;" name="content">{{$article->content}}</textarea>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img style="height: 200px;width: 200px" src="/{{$article->picture->path}}/{{$article->picture->name}}" alt="{{$article->picture->title}}">
                    </td>
                    <td>
                        <p>
                            image change
                        </p>
                        <label>
                            <input type="file" name="image" alt="download image" accept="image/*">
                        </label>
                    </td>
                </tr>
            </table>
                <label>

                    <input type="submit" value="edit article">
                </label>
        </form>
    </div>
</x-content>
