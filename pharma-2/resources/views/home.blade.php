@extends('layouts.app')

@section('content')


<div class="container pt-5">
  
    {{-- bashy krdnaway kamera --}}
    {{-- <div class="col-lg-4 col-12 text-cenrt ">
        <canvas width="320" height="240" id="webcodecam-canvas"></canvas> <br>
        <span class="notify   bg-danger"></span> <br>
        <button title="Play" class="btn btn-success m-2" id="play" type="button" data-toggle="tooltip">Play</button>
        <select class="form-control" id="camera-select"></select>
    </div>

    <div class="col-lg-4 col-12 text-cenrt ">

        <div class="invoice text-center radius-20 shadow bg-white">

        </div>
    </div> --}}


    <script type="text/javascript" src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script>
 <div class="text-center"><span class="notify  m-3   bg-danger"></span> <br></div> 
    <div class=" text-center row  mt-2 radius-20 shadow bg-white">
   
        {{-- <script type="text/javascript" src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script> --}}
      {{-- <div class="m-2 col-lg-3 row"> <a href="{{ url('/printP') }}" class="btnprn "><span class="btn btn-success m-2 btn-sm"
                style="float:left">Print</span> </a> --}}
                <div class="m-2 col-lg-3 row"> <span onclick="printpage_protrct('print')" class="btn btn-success m-2 btn-sm"
                    style="float:left">Print</span> 
                <a href="clean" class=""> <span class="btn btn-danger m-2 btn-sm "
                    style="float:left">Save</span></a></div>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.btnprn').printPage();
            });

        </script>

<div class="col-lg-4">  <img src="{{asset('assets/img/logo.svg')}}"class=""  width="50px" alt=""></div>
      
 <input type="text" class="form-control col-lg-4 text-left mt-2 id " name="barcode" placeholder="Barcode ..." id="id">
        <table class="table" id="example2">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price </th>
                    <th>Piece</th>
                    <th>Total</th>
                </tr>

            </thead>
            <tbody class="tb">

            </tbody>
        </table>
       
    </div>
   
<div class="modal">
    <div id="print">
        @include('printP')
    </div>
</div>
    
</div>


{{-- <script type="text/javascript" src="{{asset('assets/lib/qrcodelib.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/lib/webcodecamjs.js')}}"></script> --}}

<script>


function printpage_protrct(el) {


var data = '<input type="button" id="printPageButton" class="printPageButton" style="display: block;width: 100%; border: none; background-color: #008B8B; color: #fff;padding: 14px 28px; font-size: 16px; cursor: pointer;text-align: center;" value="Print Page" onclick="window.print()" >';
data += document.getElementById(el).innerHTML;
myReceipt = window.open("","mywin","left=150, top=130 ,width=400,height=500");
myReceipt.screnX = 0;
myReceipt.screnY = 0;
myReceipt.document.write(data);
myReceipt.document.title = "Print Page";
myReceipt.focus();
setTimeout(()=>{
myReceipt.close();
},8000);
// $('.nameee').addClass('d-none');
}


    function sound(sound) {
        var obj = document.createElement("audio");
        obj.src = "assets/audio/" + sound + ".mp3";
        obj.play();
    }

    function table() {
        $.post('viewtb', {
                _token: '{{csrf_token()}}'
            },
            function (response) {
                $(".tb").html(response);
            })
    }

    function invoice() {
        $.post('invoice', {
                _token: '{{csrf_token()}}'
            },
            function (response) {
                $(".tb").html(response);
            })
    }
    function Print_item() {
        $.get('print_item', {
                _token: '{{csrf_token()}}'
            },
            function (response) {
                $(".tbg").html(response);
            })
    }

    function undo(sold_id) {
        $.post('undo', {
                sold_id: sold_id,
                _token: '{{csrf_token()}}'
            },
            function (response) {
                if (response == "success") {
                    // table();
                    invoice();
                    Print_item()
                    sound('fild');
                } else {
                    // table();
                    console.log("hal haya");
                    sound('undo');
                }
            })
    }

    function addCuont(sold_id) {
        $.post('addCuont', {
                sold_id: sold_id,
                _token: '{{csrf_token()}}'
            },
            function (response) {
                if (response == "success") {
                    // table();
                    invoice();
                    Print_item();
                    sound('beep');
                } else {
                    // table();
                    console.log("hal haya");
                    sound('undo');
                    $(".notify").html(response);
                }
            })
    }

    $('#id').keypress(function (event) {
        if (event.keyCode == 13) {
            var barcode = $(".id").val();
            $.post('home', {
                    barcode: barcode,
                    _token: '{{csrf_token()}}'
                },
                function (response) {
                    if (response === "success") {
                        // table();
                        invoice();
                        Print_item();
                       $(".id").val("");
                       $(".notify").html("");
                    } else {
                        sound('undo');
                        $(".notify").html(response);
                    }
                }) 
        }
    });


    (function (undefined) {
        "use strict";

        function Q(el) {
            if (typeof el === "string") {
                var els = document.querySelectorAll(el);
                return typeof els === "undefined" ? undefined : els.length > 1 ? els : els[0];
            }
            return el;
        }

        var play = Q("#play"),
            args = {
                resultFunction: function (res) {
                    var barcode = res.code;
                    // var id = $(".id").val();
                    $.post('home', {
                            barcode: barcode,
                            _token: '{{csrf_token()}}'
                        },
                        function (response) {
                            if (response === "success") {
                                table();
                                invoice();
                                Print_item();
                            } else {
                                sound('undo');
                                $(".notify").html(response);
                            }
                        })

                    // Write Ajax Here...
                }

            };
        var decoder = new WebCodeCamJS("#webcodecam-canvas").buildSelectMenu("#camera-select", "environment|back")
            .init(args);
        play.addEventListener("click", function () {
            decoder.play();
        }, false);

        document.querySelector("#camera-select").addEventListener("change", function () {
            if (decoder.isInitialized()) {
                decoder.stop().play();
            }
        });
    })


  

</script>

@endsection
