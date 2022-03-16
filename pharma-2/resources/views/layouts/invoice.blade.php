
   
        
            @foreach ($solds as $item)
            <tr>
                <td>{{$item->stock->name}}</td>
                <td>{{$item->price_at}}</td>
                <td >
                    <div class="">
                          <button class="btn btn-danger btn-sm " onclick="undo(`{{$item->id}}`)">-</button>
  
                          <input type="number" class="text-center col-2" readonly value="{{$item->piece}}"    min="1">
                          <button class="btn btn-success btn-sm " onclick="addCuont(`{{$item->id}}`)">+</button>
                   </div>
                      </td>
                <td>{{number_format($item->piece * $item->price_at , 0 ,'.','.')}} IQD</td>
            </tr>
            @endforeach
            @php
        $sum = 0;
        for($i = 0 ; $i<count($solds); $i++){
            $k = $solds[$i]['price_at'] * $solds[$i]['piece'];
            $sum += $k;
        }
    @endphp
            <tr>
                <th colspan="3">All Price</th>
                <td>{{number_format($sum,0,'.','.')}} IQD</td>
            </tr>
        
    

<script type="text/javascript">


    
      
    </script>