@extends('master.layout')
@section("title",'admin Dashboard')
@section('style')
<style>
    body{
        background-image: linear-gradient(
  40deg,
  hsl(202deg 98% 22%) 0%,
  hsl(188deg 27% 51%) 50%,
  hsl(150deg 38% 89%) 100%
);
    }
.users,.posts{
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
    width: 100%;

}
.publish{
    white-space: nowrap;
}

.olo{
    margin-top:100px ;
    background-color: rgba(0, 0, 0, 0.089);
    border-radius: 18px;
    padding-left: 0%;
}
.all{
    background: red;
}
@media (max-width: 990px){
    .olo{
        margin-top: 270px;
    }
}

.email{
    position: absolute;
    right: 90px;
}
    
</style>

@endsection
@section('content')

<div class="container olo">
    <div class="email">
        <a href="https://mail.google.com/mail/u/2/?pli=1#inbox" class="badge bg-info text-wrap text-decoration-none m-4">       <i class="fa-solid fa-envelope"></i>
            Email inbox</a>
    </div>

    <h2>Users:{{$total_users}}</h2>
        <a href="{{route('usersPdf')}}"class="btn btn-secondary btn-sm" style="margin: 5px">
            <i class="fa-solid fa-file-pdf"></i> telecharger
        </a>
        
    
    {{-- <a href="{{route('usersPdf')}}">telechargé</a> --}}
    <div class="users">
        <table class="rounded table table-light table-striped-columns">
            <thead class="table-dark">
            <tr>
                <th>id</th>  <th>userName</th> <th>email</th>  <th>NBR posts</th> <th>ban</th> <th>change ban</th>
            </tr>
            </thead>
            @foreach($users_infos as $item)
            <tr> 
                <td>{{$item->user->id}}</td>
                <td>{{$item->user->name}}</td> 

                <td>{{$item->user->email}}</td> 
                
                <td>{{$item->post_count}}</td>

                <td>{{$item->user->ban}}</td>

                <td>
                    <a href="{{route('unbanned',$item->user->id)}}" class="btn btn-primary btn-sm bg-success text-body-secondary rounded-pill border-0">Unban</a>
                    <a href="{{route('banned',$item->user->id)}}" class="btn btn-primary btn-sm bg-danger text-body-secondary rounded-pill border-0">ban</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>



    <h2>posts:
        {{$total_posts}}

    </h2>
    <a href="{{route('postsPdf')}}"class="btn btn-secondary btn-sm" style="margin: 5px">
        <i class="fa-solid fa-file-pdf"></i> telecharger
    </a>
    
    <div class="posts">
        <table class="table table-light table-striped-columns rounded">
            <thead class="table-dark">
                <tr>
                    <th>id</th><th> image</th> <th>post title</th> <th>post content</th> <th>status</th> <th>user</th> <th>created at</th>  <th>change status</th> 
                </tr>
            </thead>
            @foreach ($posts_infos as $item)
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
                <td class="publish">
                    <a href="{{route('published',$item->slug)}}" class="btn btn-primary btn-sm bg-success text-body-secondary rounded-pill  border-0" style="display: inline-block">Publish</a>
                    <a href="{{route('unpublished',$item->slug)}}" class="btn btn-primary btn-sm bg-danger text-body-secondary rounded-pill border-0" style="display: inline-block">Unpublish</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection