@extends('layouts.app')

@section('content')


<h3>Add Casher</h3>
<div class="container ">
    @if ($errors->any())
        @foreach ($errors->all() as $erorr)
            <div class="alert alert-danger radius-20">{{$erorr}}</div>
        @endforeach
    @endif
   @if (session('success'))
   <div class="alert alert-success radius-20">{{session('success')}}</div>
       
   @endif

<form action="Casher"method="post" class="text-center">
@csrf

<div class="form-group row text-center justify-content-center ">
    <div class="col col-4 mt-5">
  <label for="" class="text-dark"style="font-size:20px"> Name Casher</label>
  <input type="text" name="name"  class="form-control radius-20" placeholder="Name Casher" aria-describedby="helpId">
</div>

<div class="col col-4 mt-5">
    <label for="" class="text-dark"style="font-size:20px"> Email Casher</label>
    <input type="Email" name="email"  class="form-control radius-20" placeholder="Email Casher" aria-describedby="helpId">
  </div>

  <div class="col col-4 mt-5">
    <label for="" class="text-dark"style="font-size:20px"> Password Casher</label>
    <input type="Password" name="password"  class="form-control radius-20" placeholder="Password Casher" aria-describedby="helpId">
  </div>

  <div class="col col-4 mt-5">
    <label for=""  class="text-dark"style="font-size:20px"> Rule </label>
<select name="rule" class="form-control radius-20"  id="">
    <option value="0">Casher</option>
    <option value="1">Admin</option>
</select>
  </div>
  
</div>
<button type="submit" class="btn btn-dark form-control radius-20 col-4 mt-5  text-center">Add User </button>
</form>

<hr>

<div class="row justify-content-center">
    @foreach ($user as $item)
        
    <div class="card m-2  text-center radius-20" style="width: 18rem;">
       <i class="ion-person text-info" style="font-size:100px"></i>
        <div class="card-body">
        <h6 class="text-dark">Name : {{$item->name}}</h6>
        <h6 class="text-dark">Emali : {{$item->email}}</h6>
        @if ($item->rule == 0)
            <h6 class="text-dark">Rule : Casher</h6>
        @else
           <h6 class="text-dark">Rule : Admin</h6>

        @endif
      
        </div>
      </div>
    @endforeach

</div>

</div>


@endsection
