@extends('master.layout')
@section('style')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

body{
  background-image: linear-gradient(
  40deg,
  hsl(323deg 38% 76%) 0%,
  hsl(318deg 23% 45%) 50%,
  hsl(310deg 75% 15%) 100%
);}
.add{
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}

.lform{
  max-width: 900px;
  width: 100%;
}
.errors{
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}
.form{
  padding: 20px;
  background-color: rgba(0, 0, 0, 0.226)
}

@media (max-width: 990px){
  .all{
    margin-top: 250px;
  }
}
.all{
  margin-top: 55px
}
h1{
  font-family: 'Poppins', serif;
  font-weight: bold;
  padding: 10px;

}
</style>

@endsection
@section('content')
<div class="all">


  @if (session('success'))
  <div class="alert alert-success">
      {{ session('success') }}
  </div>
@endif
<form action="{{route('storePosts')}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="container add">
    <div class="input-group mb-3 lform">
      @if ($errors->any())
        <div class="alert alert-danger errors">
          <div class="h4 pb-2 mb-4 text-danger border-bottom border-danger">
            Dangerous heading
          </div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
        <h1>Share your thoughts with the world</h1>
        <div class="input-group flex-nowrap mb-5">
          <input type="text" class="form-control rounded" placeholder="Title" aria-describedby="addon-wrapping" name="title">
        </div>

      <textarea class="form-control mb-5 rounded" aria-label="With textarea" placeholder="Content" name="body"></textarea>      
        <div class="input-group">
          <select class="form-select mb-5" id="inputGroupSelect01" name="categories">
          <option value="0">Select Category</option>
          <option value="1">Questions</option>
          <option value="2">Reviews</option>
          <option value="3">Recommendations</option>
          <option value="4">Analysis</option>
          <option value="5">News & Rumors</option>
          <option value="7">POV</option>
          <option value="6">Others</option>
          </select>
        </div>
      <input type="file" class="form-control mb-5 rounded" id="inputGroupFile01" placeholder="Image" name="image">
      <div class="d-grid gap-2 w-100 mx-auto">
        <button class="btn btn-outline-dark rounded" type="submit">Button</button>
      </div>
    </div>
</div>
</form>

</div>
@endsection
