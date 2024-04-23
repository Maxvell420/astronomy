<x-layout :styles="$styles" :title="$title">
    <div class="editWrapper" style="min-width: 800px">
        <h3 class="editHead">
            Создание Новости
        </h3>
        <form action="{{route('article.save')}}" method="Post" enctype="multipart/form-data" class="editForm">
            @csrf
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title" value="{{old('title')}}" placeholder="Заголовок статьи">
            <label for="content">Текст Новости</label>
            <textarea id="content" name="content" placeholder="Текст статьи">{{old('content')}}</textarea>
            <label for="file">Загрузить изображение</label>
            <div class="editImageDiv">
                <input type="file" id="file" name="image" alt="Загрузить изображение" accept="image/*">
            </div>
            <button class="save-button">Сохранить</button>
        </form>
    </div>
</x-layout>
