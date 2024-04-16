<x-content>
    <div class="form">
        <form action="{{route('users.save')}}" method="post">
            @csrf
            <table>
                <tr>
                    <th>
                        SignUp form
                    </th>
                </tr>
                <tr>
                    <td>
                        Name
                    </td>
                    <td>
                        <label>
                            <input type="text" name="name" value="{{old('name')}}" placeholder="name">
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>
                        Password
                    </td>
                    <td>
                        <label>
                            <input type="password" name="password" value="{{old('password')}}" placeholder="password">
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
