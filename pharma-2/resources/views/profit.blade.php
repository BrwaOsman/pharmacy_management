@extends('layouts.app')

@section('content')

<style>
    th,td{
        color: black;
        text-align: center;
    }
   .profit{
        font-size: 100px;
        color: rgb(43, 152, 182);
    }
    h4{
        margin-bottom:20px; 
    }
</style>

<div class="card">
    <div class="card-header">
        <h3 class="card-title text-dark">Profit Table</h3>
    </div>
    <center>
        <form action="{{route('search')}}" method="POST">
            @csrf
       
        <div class="row  container mt-2">
        <input type="date" name="start_time" id="" class="form-control col-4">
        <h5 class="text-dark m-2">VS</h5>
        <input type="date" name="end_time" id="" class="form-control col-4">
     
        <button class="btn btn-info ml-2"> Search BY Date</button> 
    </form>
    </div>
    </center>
    
    <!-- /.card-header -->
    <div class="card-body" id="print">
        <span class="btn btn-success m-2 " onclick=" window.print('print')">Print</span>
        <table class="table table-bordered" id="example2">
            <thead>
                <tr>
                  <th>
                      <h4>Date</h4> 
                    <i class="fas fa-calendar-day profit"></i>
                     
                    </th>
                  <th>
                    <h4>All pices</h4>
                    <i class="fas fa-pen-square profit "></i>
                  </th>
                  <th>
                      <h4>Number Produce</h4>
                    <i class="fas fa-shopping-cart profit"></i>
                  </th>
                  <th>
                    <h4>Revenue</h4>
                    <i class="fas fa-gift  profit"></i>
                  </th>
                  <th>
                    <h4> Profit</h4>
                    <i class="fas fa-hand-holding-usd profit"></i>
                    </th>

                </tr>
            </thead>
            <tbody>
                
                    @foreach ($solid as $item)  
                    {{-- @if ($key == 'date') --}}
                @php
                    $date =$item['created_at'] ;
                    $all_price_selling = (App\Models\sold::where('created_at',$item['date'])->sum('piece')) * (App\Models\sold::where('created_at',$item['date'])->sum('price_at'));
                    $all_price_by = (App\Models\sold::where('created_at',$item['date'])->sum('piece')) * (App\Models\sold::where('created_at',$item['date'])->sum('selling_at'));
                $profit = $all_price_selling - $all_price_by;
             @endphp       
                          {{-- @foreach ($value as $item) --}}
 <tr>
                          <td> {{ $item['date'] }} 
                            </td>
                            <td>{{App\Models\sold::where('created_at',$item['date'])->sum('piece')}}
                             </td>
                            <td>{{App\Models\sold::where('created_at',$item['date'])->count()}}</td>
                            <td>{{ number_format(App\Models\sold::where('created_at',$item['date'])->sum('price_at'), 0 ,'.','.')}} IQD</td>
                           <td>{{number_format($profit,0,'.','.')}}</td>
                           </tr>    
                          {{-- @endforeach  --}}
{{--                         
                    @elseif ($key == 'revenue' || $key == 'profit')
                         <td>{{number_format($value,0,'.','.')}}</td>
                    @else
                    <td>{{$value}}</td>

                    @endif --}}
                    
                       @endforeach 
                
                
            </tbody>
        </table>
    </div>
   
</div>
{{-- <script>
    function print() {
        window.print();
    }
</script> --}}

@endsection
