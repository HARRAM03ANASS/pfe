<style>
    .posts{
        display: flex;
        justify-content: center;
        align-items: center;
    }
th,td{
    border: 2px solid black;
}
table {
    border-collapse: collapse;
    text-align: center;
    width: 90%
}

</style>
{{-- <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

<table class="table table-warning table-striped-columns">
    <thead class="table-dark">
        <tr>
            <th>id</th><th>post image</th> <th>post title</th> <th>post content</th> <th>status</th> <th>user</th> <th>created at</th> 
        </tr>
    </thead>
    @foreach ($postsInfos as $item)
    <tr>
        <td>
            {{$item->id}}
        </td>
        <td>               
            <img class="img post rounded" src="{{asset('./uploads/'.$item->image)}}" alt="Card image cap" width="70px" height="70px">
        </td>
        <td>
            {{$item->title}}
        </td>
        <td>
            {{$item->body}}
        </td>
        <td>
            {{$item->status}}
        </td>
        <td>
            {{$item->user->name}}
        </td>
        <td>
            {{$item->created_at}}
        </td>
    </tr>
    @endforeach
</table>
