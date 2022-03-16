@extends('layouts.app')

@section('content')

<link href="{{ asset('assets/dataTable/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{asset('assets/dataTable/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/dataTable/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/dataTable/buttons.print.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/dataTable/dataTables.buttons.min.js')}}"></script>


<div class="row justify-content-lg-start m-3">
    @foreach ($lists as $key => $value)

    @if ($key == 'All Price Today' || $key == 'All Piece Today' || $key == 'All Piece and Price Today') 
    <span class="btn btn-light m-2 radius-10">{{$key}} : {{number_format($value,0,'.','.')}} </span>
    @else
     <span class="btn btn-dark m-2 radius-10">{{$key}} : {{number_format($value,0,'.','.')}} </span>
    @endif
       
    @endforeach
   
</div>
 <div class="">
    @foreach ($list2 as  $key => $value)

   @if ($key == 'All Profit Today' ) 
    <span class="btn btn-light m-2 radius-10">{{$key}} : {{number_format($value,0,'.','.')}} </span>
    @else
     <span class="btn btn-dark m-2 radius-10">{{$key}} : {{number_format($value,0,'.','.')}} </span>
    @endif
    @endforeach
    </div>

@include('layouts.tabale')




<script type="text/javascript">

function invoice() {
        $.post('invoice', {
                _token: '{{csrf_token()}}'
            },
            function (response) {
                $(".invoice").html(response);
            })
    }

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


@endsection
