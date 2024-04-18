<x-content>
    <div class="form">
        <form action="{{route("auth")}}" method="POST">
            @csrf
            <form action="{{route("auth")}}" method="POST">
                @csrf
                <table>
                    <tr>
                        <th>
                            Вход
                        </th>
                    </tr>
                    <tr>
                        <td>
                            Логин
                        </td>
                        <td>
                            <label>
                                <input type="text" name="name" value="{{old('name')}}" placeholder="Пароль">
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
        </form>
        <div>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</x-content>
