<div>
    
    @if (session()->has('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
@endif
    {{-- <form action="Supplier/0/0" method="post" class="text-center">
        @csrf --}}
        <h1 class="text-center text-dark">Add Supplier</h1>
<div class="text-center" >
        <div class="form-group row text-center justify-content-center ">
            <div class="col col-4 mt-5">
                <label for="" class="text-dark" style="font-size:20px"> Name supplier</label>
                <input type="text"  wire:model='company_name' class="form-control radius-20" placeholder="Name supplier"
                    aria-describedby="helpId">
                    @error('company_name') <span class="error bg-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col col-4 mt-5">
                <label for="" class="text-dark" style="font-size:20px"> Email supplier</label>
                <input type="Email" wire:model='email' class="form-control radius-20" placeholder="Email supplier"
                    aria-describedby="helpId">
                    @error('email') <span class="error bg-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col col-4 mt-5">
                <label for="" class="text-dark" style="font-size:20px"> Adderss supplier</label>
                <input type="text"  wire:model='address' class="form-control radius-20" placeholder="Address supplier"
                    aria-describedby="helpId">
                    @error('address') <span class="error bg-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col col-4 mt-5">
                <label for="" class="text-dark" style="font-size:20px"> phone supplier</label>
                <input type="number"  wire:model='phone_number' class="form-control radius-20" placeholder="phone Casher"
                    aria-describedby="helpId">
                    @error('phone_number') <span class="error bg-danger">{{ $message }}</span> @enderror
            </div>

          

        </div>
          {{-- @if (Request::segment(1) != 'Supplier')
            <span type="button" class="btn btn-danger form-control radius-20 col-4 mt-5  text-center" >
                Close
              </span>
            @endif --}}
        <button type="submit"  wire:click.prevent="add_supplier()" class="btn btn-dark form-control radius-20 col-4 mt-5  text-center"data-dismiss="mm" >Add Supplier </button>
    </div>
    {{-- </form> --}}

   
</div>
