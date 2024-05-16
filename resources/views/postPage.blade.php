@extends('master.layout')
@section('title','post page')
@section('style')
<style>
@media (max-width: 990px){
        .all{
          margin-top: 280px;
        }
      }
body{
  background-image: linear-gradient(
  45deg,
  hsl(248deg 91% 14%) 0%,
  hsl(243deg 68% 19%) 11%,
  hsl(240deg 58% 23%) 22%,
  hsl(238deg 54% 27%) 33%,
  hsl(235deg 51% 31%) 44%,
  hsl(232deg 50% 35%) 56%,
  hsl(230deg 49% 39%) 67%,
  hsl(228deg 48% 43%) 78%,
  hsl(226deg 48% 47%) 89%,
  hsl(224deg 49% 51%) 100%

);

}
    .post-container {
      max-width: 100%;
      padding: 20px;
      text-align: center;
    }
    .post-container img {
      width: 100%;
      height: auto;
      margin-bottom: 20px;
    }
  .all{
    padding-top: 100px;
  }
  .title, .text, .card-text{
    font-family: 'Poppins', serif;
    color: white;
  }

  .row{
    padding: 20px 10px 20px 10px;
    background-color: rgba(0, 0, 0, 0.247);
    border-radius: 16px;

  }
  .img{
    border-radius: 16px;
  }
  .sh{
    box-shadow: 0 2px 6px rgba(255, 255, 255, 0.2);
  }
  .content::placeholder{
    color: black;
  }
  .content{
    color: black;
  }

</style>
@endsection
@section('content')
<div id="app">

<div class="all">
  <div class="post-container">
    <div class="row">
    <div class="col-md-8 offset-md-2">
      <h1 class="title">{{$post_infos->title}}</h1>    
      <img class="img sh" src="{{asset('./uploads/'.$post_infos->image)}}" alt="Card image cap">
      <p class="card-text">{{$post_infos->getCreatedAtAttribute()->diffForHumans()}}</p>

      <p class="text">{{$post_infos->body}}</p>
    </div>
    @auth
      <hr>
      <div class="container">
        @if(session('message'))
          <p class='alert alert-sucess mb-3 container'>{{session('message')}}</p>
        @endif  

          <form action="{{route('comment')}}" method="post" class="container">
            @csrf          
            <input type="hidden" value="{{$post_infos->slug}}" name="slug" >
                <textarea class="form-control content" cols="30" rows="3" placeholder="Type Here..." name='content' style="font-family: 'Poppins';">


                </textarea>
            <button type="submit" class="btn border mb-3 mt-3" style="background-color: transparent; color:white;font-family: 'Poppins';">
                Add
            </button>
        </form>
        @endauth

        <div>
          @forelse ($post_infos->comment as $comment)
          <div class="card mb-4 container">
            <div class="card-body border-0">
              <h5 class="card-title" style="font-family: 'Poppins'; font-weight: 800;">By:{{$comment->user->name}}</h5>
              <h6 class="card-subtitle mb-2 text-body-secondary" style="font-family: 'Poppins';">{{$comment->getCreatedAtAttribute()->diffForHumans()}}</h6>
              <p class="card-text content">{{$comment->content}}</p>
              @if(Auth::check() && Auth::id()==$comment->user_id)
              <a href="{{ route('comment.delete', ['id' => $comment->id]) }}" class="btn btn-danger" style="font-family: 'Poppins';">Delete</a>
            </div>
            @endif
          </div>
          @empty
          <h4 style="font-family: 'Poppins'; font-weight: 800; color:white">No Comments Yet!</h4>
          @endforelse
        </div>
      </div>
  </div>
</div>

</div>
</div>

@endsection