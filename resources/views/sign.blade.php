<x-content>
    <div class="form">
        <form action="{{route('users.save')}}" method="post">
            @csrf
            <table>
                <tr>
                    <th>
                        Регистрация
                    </th>
                </tr>
                <tr>
                    <td>
                        Логин
                    </td>
                    <td>
                        <label>
                            <input type="text" name="name" value="{{old('name')}}" placeholder="Логин">
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        Пароль
                    </td>
                    <td>
                        <label>
                            <input type="password" name="password" value="{{old('password')}}" placeholder="Пароль">
                        </label>
                    </td>
                </tr>
            </table>
            <label>
                <input type="submit" value="log in">
            </label>
        </form>
    </div>
</x-content>
