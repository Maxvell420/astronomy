<x-content>
    <div class="form">
        <h3 style="margin: 20px">
            New Article Form
        </h3>
        <form action="{{route('article.save')}}" method="Post" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td>
                        Title
                    </td>
                    <td>
                        <label>
                            <input required type="text" name="title" placeholder="title" value="{{old('title')}}">
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        Content
                    </td>
                    <td>
                        <label>
                            <textarea style="margin: 10px;width: 400px;height: 300px" required name="content" placeholder="content">{{old('content')}}</textarea>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        Image Download
                    </td>
                    <td>
                        <input required type="file" name="image" alt="download image" accept="image/*">
                    </td>
                </tr>
            </table>
            <input type="submit">
        </form>
    </div>
</x-content>
