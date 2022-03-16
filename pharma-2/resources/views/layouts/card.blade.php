<div class="" >
   
{{--  @foreach ($buy as $stock)
    <div class="card m-2  text-center radius-20" style="width: 18rem;">
       <div class="mt-3 " style="min-height: 50px" >  
            @if ($stock->type == 1)
            {!!DNS1D::getBarcodeSVG("$stock->id", 'C128',1,53);!!}
        @else
         {!!DNS2D::getBarcodeSVG("$stock->id", 'QRCODE',5,3);!!}
            @endif
        </div>
        <div class="card-body text-left">
            @if ($stock->is_debt == 1)
            <span class="btn btn-danger btn-sm m-2 radius-20" style="position: absolute; top:0; right:0">Debt !</span>
            @endif
            <h6 class="text-dark">Barcode : {{$stock->id}}</h6>
            <h6 class="text-dark">Name : {{$stock->name}}</h6>
            <h6 class="text-dark">supplier : {{$stock->one_supplier->company_name}} </h6>
            <h6 class="text-dark">count : {{$stock->count}}</h6>
            <h6 class="text-dark">price : {{number_format($stock->price, 0 ,'.','.')}}IQD</h6>
            <h6 class="text-dark">expire Date : {{$stock->expire_date}}</h6>
            <h6 class="text-dark">created Date : {{$stock->created_at}}</h6>
            <br>
            <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#eidt{{$stock->id}}">Eidt</span>
            <span class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$stock->id}}">Delete</span> --}}
            <link href="{{ asset('assets/dataTable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
            <script type="text/javascript" src="{{asset('assets/dataTable/jquery.dataTables.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('assets/dataTable/dataTables.bootstrap4.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('assets/dataTable/buttons.print.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('assets/dataTable/dataTables.buttons.min.js')}}"></script>

<table class="table bg-white  table-hover mt-5 table-borderless  radius-20 table-striped table-responsive-sm" id="example">
    <thead>
        <tr>
            <th>Barcode</th>
            <th>Name</th>
            <th>supplier</th>
            <th>count</th>
            <th>price</th>
            <th>Selling</th>
            <th>expire Date</th>
            <th>created Date</th>
            <th>Action</th>
            @if (Request::segment(1) == 'notleft')
            <th>notleft</th>
              @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($buy as $stock) 
      
        <tr> 
            
            <td>{{$stock->barcode}}</td>
            <td>{{$stock->name}}</td>
            <td> {{$stock->one_supplier->company_name}}</td>
            <td>{{$stock->count}}</td>
            <td>{{number_format($stock->price, 0 ,'.','.')}}IQD</td>
            <td>{{number_format($stock->selling, 0 ,'.','.')}}IQD</td>
            <td>{{$stock->expire->expire_date}}</td>
            <td>{{$stock->created_at}}</td>
            <td> 
                <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#eidt{{$stock->id}}">Eidt</span>
                <span class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$stock->id}}">Delete</span>

            </td>

            @if (Request::segment(1) == 'notleft')
            <td>{{$stock->is_debt}}</td>
              @endif



            {{-- Delete modal --}}

            <div class="modal fade" id="delete{{$stock->id}}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content text-center">
                        <i class="ion-trash-b text-danger" style="font-size:150px"></i>
                        <div class="modal-body">
                            <span class="text-dark">Do you want to delete <mark class="bg-success">
                                    {{$stock->name}} </mark></span>
                        </div>
                        <form action="Buy/1/{{$stock->id}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger m-3 "> Yes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- eidt modal --}}

            <div class="modal fade bd-example-modal-lg" id="eidt{{$stock->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">

                        <div class="modal-body row justify-content-center ">


                            <form action="Buy/2/{{$stock->id}}" method="POST" class="text-center">
                                @csrf
                                    <div class=" row text-center justify-content-center">
                                <div class="col-4  mt-3">
                                    <label for="" class="text-dark" style="font-size:20px"> Barcode stock</label>
                                    <input type="number" name="barcode" class="form-control radius-20"
                                        placeholder="Barcode stock" value="{{$stock->barcode}}" aria-describedby="helpId">
                                </div>

                                <div class="col-4  mt-3">
                                    <label for="" class="text-dark" style="font-size:20px"> Name stock</label>
                                    <input type="text" name="name" class="form-control radius-20"
                                        placeholder="Name Stock" value="{{$stock->name}}" aria-describedby="helpId">
                                </div>

                                <div class="col-4  mt-3">
                                    <label for="" class="text-dark" style="font-size:20px"> supplier</label>
                                    <select name="supplier_id" id="" class="form-control radius-20 text-dark">
                                        <option value="{{$stock->supplier_id}}">{{$stock->one_supplier->company_name}}
                                        </option>
                                        @foreach ($supplier as $sup)
                                        <option class="" value="{{$sup->id}}">{{$sup->company_name}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-4  mt-3">
                                    <label for="" class="text-dark" style="font-size:20px"> count stock</label>
                                    <input type="number" name="count" class="form-control radius-20"
                                        placeholder="count stock" value="{{$stock->count}}" aria-describedby="helpId">
                                </div>

                                <div class="col col-lg-4 col-12 mt-3">
                                    <label for="" class="text-dark" style="font-size:20px"> Product Price </label>
                                    <input type="number" name="price" value="{{$stock->price}}" class="form-control radius-20" placeholder="price stock"
                                        aria-describedby="helpId">
                                </div>
                    
                                <div class="col col-lg-4 col-12 mt-3">
                                    <label for="" class="text-dark" style="font-size:20px"> Selling Product </label>
                                    <input type="number" name="selling" value="{{$stock->selling}}" class="form-control radius-20" placeholder="Selling Product"
                                        aria-describedby="helpId">
                                </div>

                                <div class="col-4  mt-3">
                                    <label for="" class="text-dark" style="font-size:20px"> expire date</label>
                                    <input type="datetime" name="expire_date" class="form-control radius-20"
                                    value="{{$stock->expire->expire_date}}" aria-describedby="helpId">
                                </div>
                                <div class="col-4  mt-3">
                                    <label for="" class="text-dark" style="font-size:20px"> is Debt </label>
                                    <select name="is_debt" id="" class="form-control radius-20">
                                        @if ($stock->is_debt == 0)
                                        <option value="0">no</option>
                                        @else
                                        <option value="1">yes</option>
                                        @endif
                                        <option value="0">no</option>
                                        <option value="1">yes</option>
                                    </select>
                                </div>
                                <div class="col-4  mt-3">
                                    <label for="" class="text-dark" style="font-size:20px"> Type code </label>
                                    <select name="type" id="" class="form-control radius-20">
                                        @if ($stock->type == 1)
                                        <option value="1">Barcod</option>
                                        @else
                                        <option value="2">QRcode</option>
                                        @endif
                                        <option value="1">Barcod</option>
                                        <option value="2">QRcode</option>
                                    </select>
                                </div>

                            </div>

                                <button type="submit" class="btn btn-success mt-3 form-control col-4 text-center  radius-20 "> Eidt</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
  
    @endforeach
    
</tr>
       
</tbody>
</table>
</div>



<script type="text/javascript">

  
    
        $(document).ready(function () {
            $('#example').DataTable({
                scrollCollapse: true,
                paging: true,
                searching: true,
                bInfo :true,
                fixedColumns: true,
                "lengthMenu": [
                    [10, 100, 200, -1],
                    [10, 100, 200, "All"]
                ],
                footer: true,
                dom: "<'row'<'col-sm-12 col-md-4' l><'col-sm-12 col-md-4 'f><'col-sm-12 col-md-4 text-right'B>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-6' i><'col-sm-12 col-md-6'p>>",
                buttons: [{
                        extend: 'excel',
                        className: 'btn btn-outline-info btn-flat',
                        footer: true,
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-outline-dark btn-flat',
                        footer: "slae",
                        title: function() {
                            return "<div '>My Title</div>"+
                                 "<h1> slaw </h1>";
      }  ,
                        customize: function (win) {
                            $(win.document.body)
                                .css('font-size', '10pt')
                                .prepend();
    
                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
    
                        }
                    },
    
                ],
            });
    
        });
    
      
    </script>
    