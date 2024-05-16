@extends('master.layout')
@section('title','Contact Us')


@section('style')

<style>       
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    
    .all{
        width: 100%;
        margin: 50px auto;
    }
    .contact-box{
        background: #fff;
        display: flex;
    }
    .contact-left{
        flex-basis: 60%;
        padding: 44px 60px;
    }
    .contact-right{
        flex-basis: 50%;
        padding: 40px;
        background:#0F2F40;
        color: #fff;
    }
    .contact-right h3{
        font-family: 'Poppins';
    }
    h1{
        margin-bottom: 10px;
        color: #0F2F40;
        font-family: 'Poppins';
    }
   .cont{
    font-weight: 900;
   } 
    .all p{
        margin-bottom: 40px;
        color: #0F2F40;
        font-family: 'Poppins';


    }
    .input-row{
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    .input-row .input-group{
        flex-basis: 45%;
    }
    input{
        width: 100%;
        border: none;
        border-bottom: 1px solid #ccc;
        outline: none;
        padding-bottom: 5px;
    }
    textarea{
        width: 100%;
        border: 1px solid #ccc;
        outline: none;
        padding: 10px;
        box-sizing: border-box;
    }
    label{
        margin-bottom: 6px;
        display: block;
        color: #0F2F40;
        font-family: 'Poppins';

    }
    .send{
        background: #0F2F40;
        width: 100px;
        border: none;
        color: #fff;
        height: 35px;
        border-radius: 30px;
        margin-top: 20px;
        box-shadow: 0px 5px 15px 0px rgba(28,0,181,0.3);
        font-family: 'Poppins';

    }
    .contact-left h3{
    color: #0F2F40;
    font-weight: 600;
    margin-bottom: 30px;
    font-family: 'Poppins';

    }
    .contact-left h3{
        font-weight: 600;
        margin-bottom: 30px;
        font-family: 'Poppins';

        }
        tr td:first-child{
        padding: 20px;
        font-family: 'Poppins';

        }
        tr td{
            padding-top: 20px;
            font-family: 'Poppins';

        }
    body{

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
    .all{
        margin-top: 100px
    }
</style>

@endsection
@section('content')
<div class="all">
    <div class="container">
            <h1 class="cont">Contact Us</h1>
            <p>We would love to respond your queries and help you succeed.<br>Feel free to get in touch with us.</p>
        <div class="contact-box">
        <div class="contact-left">
        <h3>Send Your Request</h3>
        <form action="{{route('sendemail')}}" method="POST">
            @csrf
            @if(Session::has('error'))
                <div class="alert alert-danger" style="font-family: 'Poppins';">
                    <p>{{Session::get('error')}}</p>
                </div>
            @endif

            @if(Session::has('success'))
                <div class="alert alert-success" style="font-family: 'Poppins';">
                    <p class="success">{{Session::get('success')}}</p>
                </div>
            @endif


            <div class="input-row">
                <div class="input-group">
                    <label for="">Name</label>
                    <input type="text" placeholder="Type Here..." name="name">
                    @error('name')<span class="text-danger" style="font-family: 'Poppins';">{{$message}}</span>@enderror
                </div>

            </div>
                <div class="input-row">
                    <div class="input-group">
                        <label for="">Email</label>
                        <input type="email" placeholder="Type Here..." name="email" value="{{old('email')}}" style="font-family: 'Poppins';">
                        @error('email')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <div class="input-group">
                        <label for="">Subject</label>
                        <input type="text" placeholder="Type Here..." name="subject" value="{{old('subject')}}"style="font-family: 'Poppins';">
                        @error('subject')<span class="text-danger">{{$message}}</span>@enderror

                    </div>
                </div>
                    <label for="">Message</label>
                    <textarea  rows="5" placeholder="Type Here..." name="message" value="{{old('message')}}"style="font-family: 'Poppins';"></textarea>
                    @error('message')<span class="text-danger">{{$message}}</span>@enderror
                    <button type="submit" class="send">Send</button>
        </form>
            </div>
            <div class="contact-right">
                <h3>Reach Us</h3>
                <table>
                    <tr>
                        <td>Email</td>
                        <td>altessima.contact@gmail.com</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>+212 65 77 54 780</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>123 Main Street, Los Angeles, CA 90001<br></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection