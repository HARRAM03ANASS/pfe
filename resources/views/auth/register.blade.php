@extends('master.layout')
@section('title','Register')


@section('style')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Poppins:wght@300&display=swap');
*{
    font-family: 'poppins' ,sans-serif;
    margin: 0%;
}
body{
    background-image: url('{{ asset("./imgs/MV5BNTcxMTA5ODAtZjQ0Ni00MDYxLTk0NzItMzY0NDYxZDRjMDQ5XkEyXkFqcGdeQXVyOTc5MDI5NjE@._V1_FMjpg_UX1000_.jpg") }}');
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
    font-size: 15px;
    padding: 0 0 0 45px;
    background: rgba(255, 255, 255, 0.151);
    outline: none;
    color: #ffffff;
}
i{
    position: relative;
    top: -33px;
    left: 17px;
    color: #fff;
}
.submit{
    border: none;
    border-radius: 30px;
    font-size: 15px;
    height: 45px;
    outline: none;

    width: 100%;
    color: rgb(0, 0, 0);
    background: rgba(255, 255, 255, 0.767);
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
.inputa-field .inputa::placeholder,
.inputa-field .inputa::-webkit-input-placeholder {
  color: #fff;
}

@media (max-width: 990px){
  .box{
    margin-top: 270px;
  }
}
</style>
@section('content')
<div class="box">
    <div class="contenaire">
        <form action="{{ route('register') }}" method="POST">
            @csrf
        <div class="top">
            <span>Dont' have an account?</span>
            <header>Register</header>
        </div>

        <div class="col-md-6">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
             @enderror
        </div>
        <div class="inputa-field">
            <input id="name" type="text" class="inputa form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="name">
            <i class='bx bx-user'></i>
        </div>

        <div class="inputa-field">
            <input id="email" type="email" class="inputa form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" id="">
            <i class='bx bx-envelope bx-flip-horizontal' ></i>        
        </div>

        <div class="inputa-field">
            <input id="password" type="password" class="inputa form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
            <i class='bx bx-lock-alt'></i>
        </div>

        <div class="inputa-field">
            <input id="password-confirm" type="password" class="inputa form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
            <i class='bx bx-check'></i>        
        </div>

        <div class="inputa-field">
            <input type="submit" class="submit" value="Login" id="">
        </div>
        </div>
    </form>
    </div>
</div>  

@endsection