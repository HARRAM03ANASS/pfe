@extends('master.layout')
@section('title','category Page')
@section('style')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Wix+Madefor+Display:wght@500&display=swap');
.card-title{
        font-family: 'Poppins', sans-serif;
    }
    .card-text{
        font-family: 'Wix Madefor Display', sans-serif;
    }
body{
    background-image: linear-gradient(
  45deg,
  hsl(0deg 0% 0%) 0%,
  hsl(246deg 54% 11%) 10%,
  hsl(243deg 38% 16%) 19%,
  hsl(245deg 31% 20%) 28%,
  hsl(246deg 26% 24%) 35%,
  hsl(247deg 23% 29%) 42%,
  hsl(248deg 20% 34%) 49%,
  hsl(248deg 18% 39%) 55%,
  hsl(249deg 16% 44%) 61%,
  hsl(249deg 15% 49%) 67%,
  hsl(249deg 16% 54%) 73%,
  hsl(250deg 19% 60%) 78%,
  hsl(250deg 22% 65%) 84%,
  hsl(250deg 26% 71%) 89%,
  hsl(250deg 33% 76%) 95%,
  hsl(250deg 44% 82%) 100%
);
}
@media (max-width: 576px) {
        .lpost {
            width: 100%;
        }
        .image-container {
            font-size: 5vw;
      }
    }

    @media (min-width: 577px) {
        .lpost {
            width: 50%;
        }
        .image-container {
            font-size: 5vw;
      }
    }
    .lpost {
        transition: transform 0.2s ease;
    }

    .lpost:hover {
        transform: scale(0.9);
    }
    .lposts{
        padding-top: 80px;
   }
   .dwara{
    box-shadow: 0px 7px 18px rgba(0, 0, 0, 0.308);

   }
   .oops{
    color: white;
    display: flex;
  justify-content: center;
  align-items: center;
  height:98vh;
   }

</style>
@endsection
@section('content')
@if($category_info)

<div class="section1">
    <div class="container lposts">
        <h1 style="color:white">{{$title}}</h1>

            <div class="row masonry-container" data-masonry='{"percentPosition": true }'>
                @foreach ($category_info as $info)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mb-3 lpost"> 
                    <a href="{{route('postPage',$info->slug)}}" class="post-card" style="text-decoration: none;">
                        <div class="card mt-3 dwara rounded-5 border-0  bg-light bg-gradient">
                            <img class="img post rounded-5 rounded-bottom-0" src="{{asset('./uploads/'.$info->image)}}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{$info->title}}</h5>
                                    <p class="card-text">{{Str::limit($info->body,100)}}</p>
                                    <p class="card-text">By:{{$info->user->name}}</p>
                                </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    
@else
<div class="containerr">
    <h1 class="oops">there is no posts!!!</h1>
    <i class="fa-regular fa-circle-exclamation"></i>
</div>

@endif

@endsection