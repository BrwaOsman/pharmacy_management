@extends('layouts.app')

@section('content')
{{-- <div class="row"> --}}


{{-- <div class="col-lg-4 col-12 text-cenrt ">
    <canvas width="320" height="240" id="webcodecam-canvas"></canvas> 

    <button title="Play" class="btn btn-success m-2 text-center" id="play" type="button" data-toggle="tooltip">Play</button>
    <select class="form-control" id="camera-select"></select>
</div> --}}



<div class="   ">
    {{-- @if ($errors->any())
    @foreach ($errors->all() as $erorr)
    <div class="alert alert-danger radius-20">{{$erorr}}</div>
    @endforeach
    @endif--}}
    @if (session('success'))
    <div class="alert alert-success radius-20">{{session('success')}}</div>

    @endif 

    <button type="button" class="btn btn-primary m-2" style="background-color: #272A2C" data-toggle="modal" data-target=".bd-example-modal-lg">Add Stock </button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content  container">
        @if ($errors->any())
        @foreach ($errors->all() as $erorr)
        <div class="alert alert-danger radius-20">{{$erorr}}</div>
        @endforeach
        @endif
       

    <form action="Buy/0/0" method="post" class="text-center">
        @csrf

        <div class="form-group row text-center justify-content-center ">
            <div class="col col-lg-4 col-12 mt-3">
                <label for="" class="text-dark" style="font-size:20px">Barcode </label>
                <input type="text" name="barcode" class=" id form-control radius-20" placeholder="Barcode stock"
                    aria-describedby="helpId">
            </div>

            <div class="col col-lg-4 col-12 mt-3">
                <label for="" class="text-dark" style="font-size:20px"> Name stock</label>
                <input type="text" name="name" class="form-control radius-20" placeholder="Name stock"
                    aria-describedby="helpId">
            </div>

            <div class="col col-lg-4 col-12 mt-3">
                <label for="" class="text-dark" style="font-size:20px"> supplier</label>
                <span class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg2">add supplier</span>
              

                <div class="modal mm fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <livewire:counte>
                    </div>
                  </div>
                </div>


                <select name="supplier_id" id="" class="form-control radius-20">
                    @foreach ($supplier as $sup)
                    <option value="{{$sup->id}}">{{$sup->company_name}}</option>
                    @endforeach

                </select>
            </div>

            <div class="col col-lg-4 col-12 mt-3">
                <label for="" class="text-dark" style="font-size:20px"> count stock</label>
                <input type="number" name="count" class="form-control radius-20" placeholder="count stock"
                    aria-describedby="helpId">
            </div>

            <div class="col col-lg-4 col-12 mt-3">
                <label for="" class="text-dark" style="font-size:20px"> Product Price </label>
                <input type="number" name="price" class="form-control radius-20" placeholder="price stock"
                    aria-describedby="helpId">
            </div>

            <div class="col col-lg-4 col-12 mt-3">
                <label for="" class="text-dark" style="font-size:20px"> Selling Product </label>
                <input type="number" name="selling" class="form-control radius-20" placeholder="Selling Product"
                    aria-describedby="helpId">
            </div>

            <div class="col col-lg-4 col-12 mt-3">
                <label for="" class="text-dark" style="font-size:20px"> expire date</label>
                <input type="date" name="expire_date" class="form-control radius-20" aria-describedby="helpId">
            </div>
            <div class="col col-lg-4 col-12 mt-3">
                <label for="" class="text-dark" style="font-size:20px"> is Debt </label>
                <select name="is_debt" id="" class="form-control radius-20">
                    <option value="0">no</option>
                    <option value="1">yes</option>
                </select>
            </div>
            <div class="col col-lg-4 col-12 mt-3">
                <label for="" class="text-dark" style="font-size:20px"> Type Code </label>
                <select name="type" id="" class="form-control radius-20">
                    <option value="1">Barcode</option>
                    <option value="2">QRcode</option>
                </select>
            </div>





        </div>
        <button type="submit" class="btn btn-dark form-control radius-20 col-4 mt-5  text-center">Add Stock </button>
    </form>


 
</div>
</div>
</div>
    
    {{-- </div> --}}

    <div class="  ">
        
        @include('layouts.card')
        {{-- <div class="d-flex justify-content-center">
       {{$buy->onEachSide(5)->links()}}



    </div> --}}
</div>




<script>




</script>


@endsection
