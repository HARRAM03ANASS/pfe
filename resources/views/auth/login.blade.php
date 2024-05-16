@extends('master.layout')
@section('title','Login')
@section('style')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Poppins:wght@300&display=swap');
*{
    font-family: 'poppins' ,sans-serif;
}
body{
    background-image: url('{{ asset("./imgs/MV5BNzBlYThmNTMtMTU0MC00OTBjLWExOGItZDcxNmQ4YjRkZGQ1XkEyXkFqcGdeQXVyMTUzMTg2ODkz._V1_FMjpg_UX1000_.jpg") }}');
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;
    
}
.box{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 90vh;
}
.contenaire{
    width: 350px;
    display: flex;
    flex-direction: column;
    padding: 0 15px 0 15px;
    
}
span{
    color: #fff;
    font-size: small;
    display: flex;
    justify-content: center;
    padding: 10px 0 10px 0;
}
header{
    color: #fff;
    font-size: 30px;
    display: flex;
    justify-content: center;
    padding: 10px 0 10px 0;
}

.inputa-field .inputa{
    height: 45px;
    width: 100%;
    border: none;
    border-radius: 30px;
    color: #ffffff;
    font-size: 15px;
    padding: 0 0 0 45px;
    background: rgba(255,255,255,0.1);
    outline: none;
}
i{
    position: relative;
    top: -33px;
    left: 17px;
    color: #ffffff;
}

.submit{
    border: none;
    border-radius: 30px;
    font-size: 15px;
    height: 45px;
    outline: none;
    width: 100%;
    color: black;
    background: rgba(255,255,255,0.7);
    cursor: pointer;
    transition: .3s ;
}
.submit:hover{
    box-shadow: 1px 5px 7px 1px rgba(0, 0, 0, 0.2);
}
.two-col{
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    color: #fff;
    font-size: small;
    margin-top: 10px;
}
.one{
    display: flex;
}
label a{
    text-decoration: none;
    color: #fff;
}
.two a{
    text-decoration: none;
    color: #fff;
}
.inputa-field .inputa::placeholder,
.inputa-field .inputa::-webkit-input-placeholder {
  color: #fff;
}
@media (max-width: 990px){
  .box{
    margin-top: 230px;
  }
}
</style>


@endsection
@section('content')
<div class="box">
    <div class="contenaire">
        <form action="{{ route('login') }}" method="POST">
            @csrf
        <div class="top">
            <span>Have an account?</span>
            <header>Login</header>
        </div>


        <div class="inputa-field">
            <input id="email" type="email" class="inputa form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" placeholder="Email" id="">
            <i class='bx bx-user'></i>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="inputa-field">
            <input id="password" type="password" class="inputa form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="">
            <i class='bx bx-lock-alt'></i>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="inputa-field">
            <input type="submit" class="submit" value="Login" id="">
        </div>

        <div class="two-col">
            <div class="one">
               <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

               <label for="check"> Remember Me</label>
            </div>
            <div class="two">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Forgot password?</a>
                @endif
            </div>
        </div>
    </form>
    </div>
</div>  

@endsection


