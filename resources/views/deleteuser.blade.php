<h1> users list</h1>
@if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
        @endif
<table border=1px>
    <tr>
        <td>id</td>
        <td>name</td>
        <td>email</td>
        <td>password</td>
        <td>operation</td>
    </tr>
    @foreach ($users as $item)
    <tr>
        <td>{{$item['id']}}</td>
        <td>{{$item['name']}}</td>
        <td>{{$item['email']}}</td>
        <td>{{$item['password']}}</td>
        <td><a href={{"delete/".$item['id'] }} >delete</a>
        <a href={{"edit/".$item['id'] }} >edit</a></td>
    </tr>
    @endforeach
</table>