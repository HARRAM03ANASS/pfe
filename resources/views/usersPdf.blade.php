{{-- <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<style>
    .users{
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
<div class="users">
    <h2>Users Dashboard</h2>
    <table class="rounded table table-info table-striped-columns">
        <thead class="table-dark">
        <tr>
            <th>id</th>  <th>userName</th> <th>email</th>  <th>NBR posts</th> <th>ban</th>
        </tr>
        </thead>
        @foreach($usersInfo as $item)
        <tr> 
            <td>{{$item->user->id}}</td>
            <td>{{$item->user->name}}</td> 

            <td>{{$item->user->email}}</td> 
            
            <td>{{$item->post_count}}</td>

            <td>{{$item->user->ban}}</td>

        </tr>
        @endforeach
    </table>
</div>