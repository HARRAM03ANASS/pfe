@extends('master.layout')
@section('title','home')
@section('style')
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Wix+Madefor+Display:wght@500&display=swap');
    .banner{
        width: 100%;
        height: auto;

    }
    .img{
        filter: grayscale(100%);
        transition: 0.2ms;
    }
    .lpost:hover{
        .img{
            filter: grayscale(0%);
        }
        
    }
    .lpost {
        transition: transform 0.2s ease;
    }

    .lpost:hover {
        transform: scale(0.9);
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
   .section1{
        /*background: #870000; 
            background: -webkit-linear-gradient(to right, #190A05, #870000);
            background: linear-gradient(to right, #190A05, #870000); */

    /* background-image: linear-gradient(to bottom, #000308, #001a4f, #001e74, #001b96, #1e00b5);    */
    /* background-image: linear-gradient(to bottom, #08080a, #101119, #141725, #171d31, #18233e, #1c2746, #202b4f, #242f57, #2e325c, #373561, #403866, #4a3b6a);*/
background-color: #D7E3F8;
} 
   .lposts{
        padding-top: 40px;
   }
    .footer{
        height: 300px;
        background:#020095;
    }
    .card-title{
        font-family: 'Poppins', sans-serif;
    }
    .card-text{
        font-family: 'Wix Madefor Display', sans-serif;
    }
.bannier{
  width: 100%;
  padding: 0;
  margin: 0;
  position: relative;

}

.bannier img{
  width: 100%;
  height: auto;

}

.banniertxt{
    position: absolute;
    top: 20%;
    color: #b7b3ec;
    padding: 10px;
    margin-left: 100px;
    margin-right:  100px;
    width: auto;
}

@media (max-width: 811px) {
  .banner-text {
    font-size: 20px; /* Font size for smaller screens */
  }
}

@media (max-width: 660px) {
  .banner-text {
    font-size:9px; /* Font size for even smaller screens */
  }
}

.aboutus{
    text-decoration: none;
    color: #b7b3ec
}
.aboutus:hover{
    color: #020095;
}
.sectiontitl{
    padding: 40px;
    font-family: 'Poppins', sans-serif;
    color: blue;
    font-weight:bolder;
    display: flex;
    justify-content: center;
    align-items: center;
}

.row.cats{
    display: flex;
  justify-content: center;
  align-items: center;
}
.cat{
    display: inline-block;
    width: 200px;
    height: 40px;
    border-radius: 8px;
    background-color: #b7b3ec;
    font-family: 'Poppins', sans-serif;
    text-decoration: none;
    font-weight:bold; 
    /* margin-bottom: 99px; */
}

.footer {
  position: relative;
    background-color: #020095;
}

.word {
    position: absolute;
    bottom: 40px;
    right: 0;
    font-family: 'Wix Madefor Display', sans-serif;
    margin-right: 20px;
    margin-top: 20px;
    font-size: 50px;
    color: white;

}
hr{
    height: 2px; /* Set the desired height */
    background-color: #020095; /* Set the desired background color */
    border: none; /* Remove the default border */
}

.by{
    height: 50px;
    width: 100%;
    background-color:rgba(0, 0, 0, 0.336);
    position:absolute;
    bottom: 0%;
    justify-content: center;
    align-items: center;
    display: flex;
    color: white;
}
/* .card-body{
    background-color: #02009549;
} */



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
{{-- @if (session('message'))
        <div class="alert alert-primary d-flex align-items-center">
            {{ session('message') }}
        </div>
    @endif --}}
    <div class="image">
        <img src="{{asset('./imgs/81568.jpg')}}" alt="" class="banner">
    </div>

<div class="section1">
        <div class="container lposts">
            <h3 class="sectiontitl">Blog Updates</h3>
            <div class="container">
                <hr>
            </div>
            <div class="row masonry-container" data-masonry='{"percentPosition": true }'>
                @foreach ($post_infos as $info)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mb-3 lpost"> 
                        <a href="{{route('postPage',$info->slug)}}" class="post-card" style="text-decoration: none;">
                            <div class="card mt-3 dwara rounded-5 border-0  bg-light bg-gradient">
                                <img class="img post rounded-5 rounded-bottom-0" src="{{asset('./uploads/'.$info->image)}}" alt="Card image cap">
                                    <div class="card-body rounded-4">
                                        <h5 class="card-title">{{$info->title}}</h5>
                                        <p class="card-text">{{Str::limit($info->body,100)}}</p>
                                        <p class="card-text">By:{{$info->user->name}}</p>
                                        <p class="card-text">{{$info->getCreatedAtAttribute()->diffForHumans()}}</p>
                                    </div>
                            </div>
                        </a>
                    </div>
                @endforeach
               
        </div>  
        <div>
            <h3 class="sectiontitl">About Us</h3>
        </div>
        {{-- <div class="container">
            <hr>
        </div> --}}
</div>     
        <div class="bannier">
            <img src="{{asset('./imgs/threeColorsBlue.jpg')}}" alt="" class="full-width-image ">
                <div class="banniertxt">
                    <h3 class="banner-text">
                        Our website is more than just a collection of movie reviews and recommendations; it is a community built on the joy of sharing cinematic experiences. We encourage our readers to immerse themselves in the magic of cinema and to embrace the joy of discovering hidden gems and sharing their favorite films with others.
                        <a href="{{route('emailcontact')}}" class="aboutus">wanna know more?</a>
                    </h3>
                </div>
        </div>

        <div>
            <h3 class="sectiontitl">Categories</h3>
        </div>
        <div class="container">
            <hr>
        </div>
        <div class="container text-center">
            <div class="row cats align-items-center text-center">
                <div class="col mt-3 alignpp">
                    <a href="{{route('categoryPage',1)}}" class="cat">questions</a>
                </div>
                <div class="col mt-3">
                    <a href="{{route('categoryPage',2)}}" class="cat">reviews</a>
                </div>
                <div class="col mt-3">
                    <a href="{{route('categoryPage',3)}}" class="cat">recommendations</a>
                </div>
        </div>
        <div class="row cats align-items-center text-center">
            <div class="col mt-3">
                <a href="{{route('categoryPage',4)}}" class=" cat">analysis</a>
                </div>
                    <div class="col mt-3">
                    <a href="{{route('categoryPage',5)}}" class=" cat">news&rumors</a>
                </div>
                    <div class="col mt-3">
                    <a href="{{route('categoryPage',7)}}" class=" cat pov">pov</a>
                </div>
            </div>
        </div>
    </div>
        
        

        <div class="d-flex justify-content-center pagination">
        {{$post_infos->links()}}
        </div>
</div>


<div class="footer">
    <span class="word">Altessima</span>
    <div class="by">
        <p>Copyright ©2023 Developped by Harram Anass</p>
    </div>
</div>
</div>
@endsection