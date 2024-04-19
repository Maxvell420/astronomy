<x-layout :styles="$styles">
    <div class="form">
        <h2>Регистрация</h2>
        <form action="{{route('users.save')}}" method="post">
            @csrf
            <label for="name">Логин</label>
            <input id="name" type="text" name="name" value="{{old('name')}}" placeholder="Логин">
            <label for="password">Пароль</label>
            <input id="password" type="password" name="password" value="{{old('password')}}" placeholder="Пароль">
            <button type="submit">Зарегистрироваться</button>
        </form>
    </div>
</x-layout>
