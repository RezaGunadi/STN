@extends('layouts.index')

@section('content')
<div class="col-md-9 mx-auto py-3">

    <div class="row">
        <div class="mt-3 col-md-6">
            <div id="reader"></div>

        </div>
        <div class="mt-3 col">
            <form action="{{ route('close_integration') }}" method="POST">
                <input type="hidden" name="staf_id" id="staf_id">
                <div class="table-responsive">

                    <table class="table w-100">
                        <thead>
                            <tr>
                                {{-- <th scope="col" style="white-space: nowrap; text-align: center;" class=" text-capitalize">#</th> --}}
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">
                                    Product
                                    Code</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">
                                    Product
                                    Name</th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">
                                    Condition
                                </th>
                                <th scope="col" style="white-space: nowrap; text-align: center;"
                                    class=" text-capitalize">Action
                                </th>

                            </tr>
                        </thead>
                        <tbody id="body-table" style="font-weight: 400!important; font-size: 14px;">
                            {{-- @php
                            $number = 0;
                            @endphp
                            @for($i = 0; $i < 10; $i++) @php $number=$number+1; @endphp 
                            <tr>
                                <th scope="row" style="font-weight: 400!important;">{{ $number }}</th>
                            <th scope="col" style="text-align: center;font-weight: 400!important;"
                                class=" text-capitalize">
                                Code</th>
                            <th scope="col" style="text-align: center;font-weight: 400!important;"
                                class=" text-capitalize">
                                Name</th>
                            <th scope="col" style="text-align: center;font-weight: 400!important;"
                                class=" text-capitalize">
                                Good</th>
                            <th scope="col" style="text-align: center;font-weight: 400!important;"
                                class=" text-capitalize">
                                Yes</th>
                            <th scope="col" style="text-align: center;font-weight: 400!important;"
                                class=" text-capitalize">
                                <button class="btn btn-secondary">
                                    Delete
                                </button>
                            </th>
                            </tr>
                            @endfor --}}
                        </tbody>
                    </table>
                </div>
                @if (Auth::user()->role =='staff gudang' || Auth::user()->role =='owner')

                <button class="btn btn-primary w-100" id="inputData" type="submit">Submit</button>
                @else

                <div class="btn btn-secondary no-access w-100">Submit</div>
                @endif

            </form>
        </div>
    </div>
    <br>
    {{-- <div class="my-3 py-3">
        <select id="search-product" class="cari form-control w-100" name="cari Produk"></select>
    </div> --}}
</div>
@endsection

@push('script')
{{-- <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script> --}}
<script src="{{ asset('assets/html5-qrcode/html5-qrcode.min.js') }}"></script>
<script type="text/javascript">
    // // inisiasi html5QRCodeScanner
    //     let html5QRCodeScanner = new Html5QrcodeScanner(
    //         // target id dengan nama reader, lalu sertakan juga 
    //         // pengaturan untuk qrbox (tinggi, lebar, dll)
    //         "reader", {
    //             fps: 10,
    //             qrbox: {
    //                 width: 400,
    //                 height: 400,
    //             },
    //         }
            
    //     );
    const formatsToSupport = [
    Html5QrcodeSupportedFormats.QR_CODE,
    Html5QrcodeSupportedFormats.UPC_A,
    Html5QrcodeSupportedFormats.UPC_E,
    Html5QrcodeSupportedFormats.UPC_EAN_EXTENSION,
    ];
    const html5QrcodeScanner = new Html5QrcodeScanner(
    "reader",
    {
        fps: 20,
        qrbox: 200,
        useBarCodeDetectorIfSupported: true,
        willReadFrequently: true,
        showZoomSliderIfSupported: true,
        defaultZoomValueIfSupported: 5,
    // fps: 10,
    // qrbox: { width: 250, height: 250 },
    // formatsToSupport: formatsToSupport,

    },
    /* verbose= */ false);
    html5QrcodeScanner.render(onScanSuccess);
        // function yang dieksekusi ketika scanner berhasil
        // membaca suatu QR Code
        function onScanSuccess(decodedText, decodedResult) {
            // redirect ke link hasil scan
            // window.location.href = decodedResult.decodedText;

            // consol.log(decodedText);
            // consol.log(decodedResult);
            // consol.log(decodedResult.decodedText);
    // alert(decodedText);
    // alert(decodedText.' || '. decodedResult.' || '.decodedResult.decodedText);
            // membersihkan scan area ketika sudah menjalankan 
            // action diatas
              $.ajax({
                
                type:"GET",
                url:'/auto-complete-qr',
                // url:'{{url("auto-complete-qr")}}',
                data: {text: decodedText}, 
                success: function(data) {
                
                // console.log(data);
                // alert(data.id);
                if (data.type=='product') {
                    
                    $('#body-table').append(`<tr id="table-`+data.id+`">
                        <th scope="col" style="text-align: center;font-weight: 400!important;" class=" text-capitalize">
                            `+data.code+`</th>
                        <th scope="col" style="text-align: center;font-weight: 400!important;" class=" text-capitalize">
                            `+data.product_name+`</th>
                        <th scope="col" style="text-align: center;font-weight: 400!important;" class=" text-capitalize">
                            `+data.status+`</th>
                        <th scope="col" style="text-align: center;font-weight: 400!important;" class=" text-capitalize">
                            <button class="btn btn-secondary" id="remove-`+data.id+`"">
                                Delete
                            </button>
                        </th>
                    </tr>`);
                    $('#body-table').append(`<input type="hidden" id="input-id-`+data.id+`" name="id[]" value="`+data.id+`">`);
                    $('#remove-'+data.id).click(function (e) {
                        e.preventDefault();
                        $( "input[name='sortby']").remove();
                        $("#table-"+data.id).addClass("d-none");
                        $("#input-id-"+data.id).remove();
                    });
                } else {
                    $("#staf-name").text(data.name);
                    $("#staf-email").text(data.email);
                    $("#staf-phone").text(data.phone);
                    $("#staf-role").text(data.role);
                    $("#staf_id").val(data.id);


                }
                }
                
                
                
                });
                html5QrcodeScanner.clear().then(_ => {html5QrcodeScanner.render(onScanSuccess);
                // the UI should be cleared here
                }).catch(error => {
                // Could not stop scanning for reasons specified in `error`.
                // This conditions should ideally not happen.
                });
                var audio = document.getElementById("scan");
                audio.play();
            // html5QRCodeScanner.clear();
        }

    // function onScanFailure(error) {
    // console.warn(`Code scan error = ${error}`);
    // }
    // setTimeout( () => {
    // let html5QrcodeScanner = new Html5QrcodeScanner(
    // "reader", { fps: 10, qrbox: 250 });
    // html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    // }, 1000)
        // render qr code scannernya
        // html5QRCodeScanner.render(onScanSuccess);
        
</script>
{{-- <script>
    $(document).ready(function () {
    
    $('#remove-2').click(function (e) {
    e.preventDefault();
    $( "input[name='sortby']").remove();
    $("#table-2").addClass("d-none");
    $("#input-id-2").remove();
    });
    });
</script> --}}
{{-- <script>
    const hints = new Map();
    const enabledFormats = [
    // ...ALL_FORMATS_WHICH_YOU_WANT_TO_ENABLE
    ZXing.BarcodeFormat.UPC_A,
    ];
    hints.set(ZXing.DecodeHintType.POSSIBLE_FORMATS, enabledFormats);
    const codeReader = new ZXing.BrowserMultiFormatReader(hints);
</script> --}}
@endpush