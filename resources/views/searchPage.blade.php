@extends('master.layout')
@section('title','Search')
@section('style')
<style>
     @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
    .newPosts{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    @media (max-width: 576px) {
        .lpost {
            width: 100%;
        }
    }

    @media (min-width: 577px) {
        .lpost {
            width: 50%;
        }
    }
    body{

        /* background-image: linear-gradient(
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
); */
background-image: linear-gradient(
  240deg,
  hsl(201deg 62% 15%) 0%,
  hsl(203deg 41% 21%) 14%,
  hsl(204deg 31% 25%) 25%,
  hsl(204deg 24% 30%) 34%,
  hsl(205deg 19% 35%) 40%,
  hsl(205deg 15% 40%) 46%,
  hsl(206deg 12% 45%) 51%,
  hsl(206deg 10% 50%) 55%,
  hsl(206deg 10% 55%) 59%,
  hsl(206deg 9% 61%) 64%,
  hsl(207deg 9% 66%) 68%,
  hsl(207deg 9% 71%) 73%,
  hsl(207deg 8% 77%) 79%,
  hsl(207deg 7% 82%) 85%,
  hsl(207deg 5% 88%) 92%,
  hsl(0deg 0% 93%) 100%
);

}
   .lposts{
    padding-top: 60px;
   }
   .lpost {
        transition: transform 0.2s ease;
    }

    .lpost:hover {
        transform: scale(0.9);
    }
    .all{
        margin-top: 130px;
        color:white;

    }
    .if{
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    height:100vh;
   }
   @media (max-width: 990px){
  .all{
    margin-top: 310px;
  }
}
.for,.if{
    font-family: 'Poppins', serif;
}
.for{
    margin-top: 100px;
}

</style>
@endsection
@section('script')
<script>
    // document.addEventListener('DOMContentLoaded', function() {
    //     var container = document.querySelector('.masonry-container');
    //     var masonry = new Masonry(container, {
    //         itemSelector: '.col-lg-3',
    //         columnWidth: '.col-lg-3'
    //     });
    // });
</script>
@endsection
@section('content')
<div class="all">
<div class="container">
    <div>
        <h2 class="for">You searching for:</h2>
    </div> 
    <div>
    <div class="container lposts">
        <div class="row masonry-container" data-masonry='{"percentPosition": true }'>
          @if($searchPosts->count() > 0)
            @foreach ($searchPosts as $info)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mb-3 lpost "> 
                <a href="{{route('postPage',$info->slug)}}" class="post-card" style="text-decoration: none">
                <div class="card mt-3 dwara rounded-5 border-0  bg-light bg-gradient" id="myElement">
                    <img class="img post rounded-5 rounded-bottom-0" src="{{asset('./uploads/'.$info->image)}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$info->title}}</h5>
                        <p class="card-text">{{$info->body}}</p>
                        <p class="card-text">By:{{$info->user->name}}</p>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
            @else
            <div>
                <h2 class="if">Oops! there is no results</h2>
            </div>
            @endif
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{$searchPosts->links()}}
    </div>
    </div>
</div>
</div>
@endsection