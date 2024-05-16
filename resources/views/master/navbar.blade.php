<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Poppins:wght@300&display=swap" rel="stylesheet">
<style>
.navbar {
    background-color: transparent;
    position: absolute;
    top: 0px;
    left: 0;
    right: 0;
    padding-top: 20px
}

.navbar-nav .nav-link..navbar-toggler-icon {
  font-weight: bold;
  font-size: 18px; /* Adjust the font size as needed */
}
.nav-link.underline{
  position: relative;

}
.nav-link.underline::after{
  content: "";
  opacity: 0;
  transition: all 0.2s;
  height: 2px;
  width:100%;
  background-color: white;
  position: absolute;
  bottom: 0;
  left: 0;
}
.nav-link.underline:hover::after{
  opacity: 1;
}
.navbar-toggler-icon{
  border: none;
  background-origin: padding-box;  
  background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23ffffff' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e")}
.navbar-toggler{
  border: none;
}
.srch{
  background: transparent;
}

</style>
<nav class="navbar navbar-expand-lg" data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand" href="{{route('home')}}">Altessima</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link underline" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link underline" href="{{route('addPosts')}}">Add Post</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Account
          </a>
          <ul class="dropdown-menu">
              @guest
                  <li><a class="dropdown-item" href="{{route('login')}}">Log in</a></li>
                  <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
              @endguest
            
              @auth
                  <li>
                    <a class="dropdown-item" href="{{route('profile')}}">                    
                      {{-- <img src="{{ Avatar::create(auth()->user()->name)->toBase64() }}" class="avatar"  style="width:30px;height:30px;margin: 0%"/> --}}
                      {{auth()->user()->name}}
                    </a>
                  </li>
                  <li><a class="dropdown-item" href="#" onclick="document.getElementById('logoutForm').submit();">Logout</a></li>
                  <form id="logoutForm" action="{{route('logout')}}" method="POST" >
                      @csrf
                  </form>

              @if(auth()->user()->role=="admin")
              <li>
                <a class="dropdown-item" href="{{route('dashboard')}}">                    
                  Dashboard
                </a>
              </li>
              
              @endif
              @endauth

              



          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link underline" aria-current="page" href="{{route('emailcontact')}}">Contact Us</a>
        </li>
      </ul>
      <form class="d-flex" role="search" method="get" action={{URL('Search')}}>
        <input class="form-control me-2 border border-light rounded-3 srch " type="search" placeholder="Search" aria-label="Search" name="search" value="">
        <button class="btn btn-outline-light rounded-pill" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}