@extends('master.layout')
@section('title','Profile')
@section('style')
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Wix+Madefor+Display:wght@500&display=swap');
.avatar,.name,.email{
  display: flex;
  justify-content: center;
  align-items: center;
  color: white;
  font-family: 'Wix Madefor Display', sans-serif;
}
body{
  /* background-image: linear-gradient(
  25deg,
  hsl(235deg 75% 30%) 0%,
  hsl(238deg 63% 33%) 7%,
  hsl(240deg 56% 36%) 14%,
  hsl(242deg 52% 39%) 21%,
  hsl(243deg 49% 41%) 29%,
  hsl(244deg 46% 43%) 36%,
  hsl(244deg 44% 46%) 43%,
  hsl(245deg 41% 48%) 50%,
  hsl(245deg 41% 51%) 57%,
  hsl(245deg 43% 53%) 64%,
  hsl(246deg 45% 56%) 71%,
  hsl(246deg 47% 59%) 79%,
  hsl(246deg 50% 61%) 86%,
  hsl(246deg 53% 64%) 93%,
  hsl(246deg 57% 66%) 100%
); */

/* background-image: linear-gradient(
  45deg,
  hsl(292deg 74% 34%) 0%,
  hsl(287deg 65% 32%) 11%,
  hsl(282deg 59% 30%) 22%,
  hsl(277deg 54% 27%) 33%,
  hsl(272deg 50% 24%) 44%,
  hsl(267deg 47% 20%) 56%,
  hsl(262deg 42% 16%) 67%,
  hsl(258deg 37% 12%) 78%,
  hsl(263deg 37% 8%) 89%,
  hsl(255deg 50% 2%) 100%
); */

background-image: linear-gradient(
  245deg,
  hsl(219deg 73% 36%) 0%,
  hsl(221deg 56% 42%) 5%,
  hsl(222deg 47% 47%) 12%,
  hsl(223deg 41% 51%) 19%,
  hsl(223deg 41% 55%) 26%,
  hsl(223deg 42% 59%) 34%,
  hsl(223deg 42% 63%) 42%,
  hsl(223deg 43% 67%) 51%,
  hsl(223deg 44% 71%) 59%,
  hsl(222deg 44% 75%) 67%,
  hsl(222deg 45% 79%) 75%,
  hsl(222deg 46% 83%) 83%,
  hsl(221deg 48% 87%) 89%,
  hsl(221deg 50% 91%) 95%,
  hsl(220deg 55% 96%) 100%
);
}
.frst{
  margin-top: 100px ;
}
@media (max-width: 990px){
  .all{
    margin-top: 310px;
  }
}
.post-card{
  border: none;
}
.if{
  font-family: 'poppins';
  color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top:150px;

}
</style>
@endsection
@section('content')
<div class="all">
    <div class="container frst">
          <div class="avatar">
            <img src="{{ Avatar::create($user_info->name)->toBase64() }}"/>
          </div>
        
          <div class="name">
            <h2>{{$user_info->name}}</h2>
          </div>
        
          <div class="email">
            <p>{{$user_info->email}}</p>
          </div>
        <div class="row masonry-container" data-masonry='{"percentPosition": true }'>
          @if($user_posts->count() > 0)
          @foreach ($user_posts as $info)
              <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mb-3 lpost"> 
                  {{-- <a href="{{route('postPage',$info->slug)}}" class="post-card"> --}}
                      <div class="card mt-3 dwara rounded-5 border-0">
                          <img class="img post rounded-5 rounded-bottom-0" src="{{asset('./uploads/'.$info->image)}}" alt="Card image cap">
                              <div class="card-body">
                                  <h5 class="card-title">{{$info->title}}</h5>
                                  <p class="card-text">{{$info->body}}</p>
                                  <p class="card-text">By:{{$info->user->name}}</p>
                                  <div class="col d-flex justify-content-between">
                                    <form action="{{route('deletePost',$info->slug)}}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill">Delete</button>
                                    </form>
                                    
                                    {{-- <form action="{{route('editPost',$info->slug)}}">
                                      @csrf
                                      <button type="button" class="btn btn-outline-warning btn-sm rounded-pill">Edit</button>
                                    </form> --}}
                                    <a href="{{ route('editPost', $info->slug) }}" class="btn btn-outline-warning btn-sm rounded-pill">Edit</a>
                                  </div>
                              </div>
                      </div>
                  {{-- </a> --}}
              </div>
          @endforeach
          @else 
          <h1 class="if">No posts found.</h1>
          @endif
      </div>
    </div>
    
</div>


@endsection