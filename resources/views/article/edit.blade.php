<x-content>
    <div class="editWrapper">
        <h3 class="editHead">
            Редактирование новости:
        </h3>
        <form action="{{route('article.update',[$article])}}" method="post" enctype="multipart/form-data" class="editForm">
            @csrf
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title" value="{{old('title')??$article->title}}">
            <label for="content">Текст Новости</label>
            <textarea id="content" name="content">{{$article->content}}</textarea>
            <label for="file">Заменить изображение</label>
            <div class="editImageDiv">
                <img src="/{{$article->picture->path}}/{{$article->picture->name}}" alt="{{$article->picture->title}}" class="editImage">
                <input type="file" id="file" name="image" alt="Загрузить изображение" accept="image/*">
            </div>
            <button class="save-button">Сохранить</button>
        </form>
    </div>
</x-content>
