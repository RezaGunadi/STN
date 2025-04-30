@extends('layouts.index')
@push('css')
<style>
    .integration-card {
        transition: all 0.3s ease;
        border: none;
        border-radius: 15px;
        background: linear-gradient(135deg, #D61212 0%, #B30E0E 100%);
        box-shadow: 0 4px 15px rgba(214, 18, 18, 0.2);
    }

    .integration-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(214, 18, 18, 0.3);
    }

    .integration-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        color: rgba(255, 255, 255, 0.9);
    }

    .integration-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #fff;
        margin-bottom: 0.5rem;
    }

    .integration-description {
        font-size: 0.95rem;
        color: rgba(255, 255, 255, 0.9);
        line-height: 1.5;
    }

    .container-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        padding: 2rem;
    }

    .section-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 2rem;
        text-align: center;
    }
</style>
@endpush

@section('content')
<div class="col-md-9 mx-auto py-4">
    <div class="container-card">
        <h1 class="section-title">Asset Management Portal</h1>

        <div class="row g-4">
            <div class="col-md-6">
                <a href="{{ URL::To('/closing-integration') }}" class="text-decoration-none">
                    <div class="integration-card p-4 text-center">
                        <div class="integration-icon">
                            <i class="bi bi-box-arrow-in-down-right"></i>
                        </div>
                        <h2 class="integration-title">Asset Returns</h2>
                        <p class="integration-description">
                            Streamline the process of asset returns and transfers. This module facilitates the seamless
                            handover of equipment from field staff to warehouse personnel, ensuring proper documentation
                            and accountability.
                        </p>
                    </div>
                </a>
            </div>

            <div class="col-md-6">
                <a href="{{ URL::To('/integration') }}" class="text-decoration-none">
                    <div class="integration-card p-4 text-center">
                        <div class="integration-icon">
                            <i class="bi bi-box-arrow-down-right"></i>
                        </div>
                        <h2 class="integration-title">Asset Deployment</h2>
                        <p class="integration-description">
                            Manage the deployment of assets to field operations. This system enables efficient tracking
                            of equipment assignments and maintains clear records of asset distribution from warehouse to
                            field staff.
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
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
                            `+data.is_consume+`</th>
                        <th scope="col" style="text-align: center;font-weight: 400!important;" class=" text-capitalize">
                            `+data.available+`</th>
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