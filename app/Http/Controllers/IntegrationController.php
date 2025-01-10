<?php

namespace App\Http\Controllers;

use App\Models\ProductDB;
use App\Models\ProductTypeDB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use LaravelQRCode\Facades\QRCode;
use Product;

// use SimpleSoftwareIO\QrCode\Facades\QrCode as FacadesQrCode;

class IntegrationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function input(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $ids = [];
        foreach ($request->id as  $value) {
            array_push($ids, $value);
        }
        $products =  ProductDB::whereIn('id', $ids)->get();
        foreach ($products as $product) {
            $product->is_available=0;
            $product->user_id=$request->staf_id;
            $product->save();
        }
        return redirect(URL::To('/integration'));
    }
    public function integration(Request $request)
    {
        $data = $request->all();
      
        return view('page.integration.input', [ 'title' => 'integration']);
    }
    public function generateQr(Request $request)
    {
        // return FacadesQrCode::text($request->qr)->png();
        // return QRCode::text($request->qr)->png();
        $file=  QRCode::text($request->qr)->setSize(10)->png();
        $response = Response::make($file);
        $response->header('Content-Type', "image/png");
        return $response;   
//         $path = public_path('uploads/image/');
// $file_name = time() . "_" . $request->code;
// $response->move($path, $file_name);
// // Download Image

// $filepath = public_path('uploads/image/')."$request->code.jpg";
// return Response::download($response);
        // return Response::download($response,
        //     $request->code.'.png'
        // );
        // return QRCode::text($request->qr)
        //     // ->setOutfile('/path/to/email-qr-code.png')
        //     ->png();
    }

    public function autoCompleteProduct(Request $request)
    {
        
        $term = $request->q;
        $queries = ProductDB::
            where(function ($query) use ($request) {
                $query->
                    where('product_name', 'LIKE', "%$request->q%")->orWhere('code', 'LIKE', "%$request->q%");
            })
        ->where('is_available',1)
        
        ->take(5)->get();
        $results = array();
        foreach ($queries as $query) {

            $results[] = ['id' => $query->id, 'code' => $query->code, 'product_name' => $query->product_name
            , 'is_consumable' => $query->is_consumable==1?'Yes':'No'
            , 'is_available' => $query->is_available==1? 'Available': 'Not Available'
        ]; //you can take custom values as you want
        }
        return response()->json($results);
    }
    public function autoCompleteUser(Request $request)
    {
        $q = $request->q;
        $queries = User::where('name', 'LIKE', "%$request->q%")->orWhere('email', 'LIKE', "%$request->q%") -> orWhere('phone', 'LIKE', "%$request->q%")->take(5)->get();
        $results = array();
        foreach ($queries as $query) {

            $results[] = ['id' => $query->id, 'email' => $query->email, 'name' => $query->name, 'phone' => $query->phone, 'name' => $query->name]; //you can take custom values as you want
        }
        return response()->json($results);
    }
    public function autoCompleteQr(Request $request)
    {
        $text = $request->text;
            $results = array();
        $query = ProductDB::where('qr_string', 'LIKE', "%$request->text%")
            ->where('is_available', 1)->first();
        if ($query) {
            $query->type='product';
            $query->is_consume= $query->is_consumable==1?'Yes':'No';
            $query->available = $query->is_available==1 ? 'Available' : 'Not Available';

            return response()->json($query); 
                // $results[] = ['type'=>'product','id' => $query->id, 'code' => $query->code, 'name' => $query->name, 'is_consumable' => $query->is_consumable == 1 ? 'Yes' : 'No']; //you can take custom values as you want
        } else {

            $query = User::where('qr', 'LIKE', "%$request->text%")->first();
            if ($query) {
                # code...
                $query->type = 'user';
                    // $results[] = ['type'=>'user','id' => $query->id, 'email' => $query->email, 'name' => $query->name, 'phone' => $query->phone, 'name' => $query->name]; //you can take custom values as you want
                return response()->json($query);
            }
        }
    }

    
}
