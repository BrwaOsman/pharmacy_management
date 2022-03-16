@extends('layouts.app')

@section('content')



<div class="container ">
    @if ($errors->any())
    @foreach ($errors->all() as $erorr)
    <div class="alert alert-danger radius-20">{{$erorr}}</div>
    @endforeach
    @endif
    @if (session('success'))
    <div class="alert alert-success radius-20">{{session('success')}}</div>

    @endif
    
<livewire:counte>
    {{-- <form action="Supplier/0/0" method="post" class="text-center">
        @csrf

        <div class="form-group row text-center justify-content-center ">
            <div class="col col-4 mt-5">
                <label for="" class="text-dark" style="font-size:20px"> Name supplier</label>
                <input type="text" name="name" class="form-control radius-20" placeholder="Name supplier"
                    aria-describedby="helpId">
            </div>

            <div class="col col-4 mt-5">
                <label for="" class="text-dark" style="font-size:20px"> Email supplier</label>
                <input type="Email" name="email" class="form-control radius-20" placeholder="Email supplier"
                    aria-describedby="helpId">
            </div>

            <div class="col col-4 mt-5">
                <label for="" class="text-dark" style="font-size:20px"> Adderss supplier</label>
                <input type="text" name="address" class="form-control radius-20" placeholder="Address supplier"
                    aria-describedby="helpId">
            </div>

            <div class="col col-4 mt-5">
                <label for="" class="text-dark" style="font-size:20px"> phone supplier</label>
                <input type="number" name="phone" class="form-control radius-20" placeholder="phone Casher"
                    aria-describedby="helpId">
            </div>



        </div>
        <button type="submit" class="btn btn-dark form-control radius-20 col-4 mt-5  text-center">Add Supplier </button>
    </form> --}}



    <hr>

    <div class="row justify-content-center">
        @foreach ($supplier as $sup)

        <div class="card m-2  text-center radius-20" style="width: 18rem;">
            <i class="ion-android-bus text-dark" style="font-size:100px"></i>
            <div class="card-body">
                <h6 class="text-dark">Name : {{$sup->company_name}}</h6>
                <h6 class="text-dark">Emali : {{$sup->email}}</h6>
                <h6 class="text-dark">Adderss : {{$sup->address}}</h6>
                <h6 class="text-dark">Phone_Number : {{$sup->phone_number}}</h6>
                <br>
                <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#eidt{{$sup->id}}">Eidt</span>
                <span class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$sup->id}}">Delete</span>

                {{-- Delete modal --}}

                <div class="modal fade" id="delete{{$sup->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <i class="ion-trash-b text-danger" style="font-size:150px"></i>
                            <div class="modal-body">
                                <span class="text-dark">Do you want to delete <mark class="bg-success">
                                        {{$sup->company_name}} </mark></span>
                            </div>
                            <form action="Supplier/1/{{$sup->id}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger m-3 "> Yes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- eidt modal --}}

                <div class="modal fade" id="eidt{{$sup->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        
                            <div class="modal-body">

                            
                            <form action="Supplier/2/{{$sup->id}}" method="POST">
                                @csrf

                                <div class="col  mt-3">
                                    <label for="" class="text-dark" style="font-size:20px"> Name supplier</label>
                                    <input type="text" name="name" class="form-control radius-20 text-center" value="{{$sup->company_name}}"
                                        placeholder="Name supplier" aria-describedby="helpId">
                                </div>

                                <div class="col  mt-3">
                                    <label for="" class="text-dark" style="font-size:20px"> Email supplier</label>
                                    <input type="Email" name="email" class="form-control radius-20 text-center" value="{{$sup->email}}"
                                        placeholder="Email supplier" aria-describedby="helpId">
                                </div>

                                <div class="col  mt-3">
                                    <label for="" class="text-dark" style="font-size:20px"> Adderss supplier</label>
                                    <input type="text" name="address" class="form-control radius-20 text-center" value="{{$sup->address}}"
                                        placeholder="Address supplier" aria-describedby="helpId">
                                </div>

                                <div class="col  mt-3">
                                    <label for="" class="text-dark" style="font-size:20px"> phone supplier</label>
                                    <input type="number" name="phone" class="form-control radius-20 text-center" value="{{$sup->phone_number}}"
                                        placeholder="phone Casher" aria-describedby="helpId">
                                </div>


                                <button type="submit" class="btn btn-success mt-3 col radius-20 "> Eidt</button>

                            </form>
                          </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex btn-sm justify-content-center ">
       {{$supplier->links()}}
    </div>


   
</div>

@endsection
