<table id="example" class="table bg-white  table-hover mt-5 table-borderless  radius-20 table-striped table-responsive-sm">
    <thead class="">
        <tr class="text-center text-sm">
            <th>Casher</th>
            <th class="text-left">Barcode</th>
            <th>Name</th>
            <th>Price at</th>
            <th>selling at</th>
            <th>Expire date</th>
            <th>Create at</th>
            <th>sold at</th>
            <th>Piece</th>
            @if (Request::segment(1) != 'sellers')
                  <th>Undo</th>
            @endif
          
        </tr>
    </thead>
    <tbody>
        @foreach ($solds as $sold)
             <tr class="text-center text-sm">
            <td >{{$sold->casher->name}}</td>
            <td class="text-left">
                @if ($sold->stock->type == 1)
              
            {!!DNS1D::getBarcodeSVG("$sold->stock_id", 'C128',1,25 ,'dark',false);!!}

                @else
                {!!DNS2D::getBarcodeSVG("$sold->stock_id", 'QRCODE',2,1);!!}
           
                @endif
            </td>
            <td>{{$sold->stock->name}}</td>
            <td>{{number_format($sold->selling_at, 0 ,'.','.')}} IQD</td>
            <td>{{number_format($sold->price_at, 0 ,'.','.')}} IQD</td>
            <td >{{$sold->stock->expire->expire_date}}</td>
            <td>{{$sold->stock->created_at}}
                </td>
            <td>{{$sold->created_at}}</td>
            <td class=" text-white" style="background-color:#465A65" >{{$sold->piece}}</td>
            @if (Request::segment(1) != 'sellers')
            <td ><i onclick="undo(`{{$sold->id}}`)" class="ion-arrow-return-left btn btn-dark"></i></td>
            @endif
        </tr>
        @endforeach
       
    
    </tbody>
</table>