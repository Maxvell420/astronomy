<x-layout :styles="$styles" :title="$title">
    <div class="form">
        <h2>Вход</h2>
        @csrf
        <form action="{{route("auth")}}" method="POST">
            @csrf
            <label for="name">Логин</label>
            <input id="name" type="text" name="name" value="{{old('name')}}" placeholder="Логин">
            <label for="password">Пароль</label>
            <input id="password" type="password" name="password" value="{{old('password')}}" placeholder="Пароль">
            <button type="submit">Войти</button>
        </form>
    </div>
</x-layout>
