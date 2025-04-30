<?php

namespace App\Http\Controllers;

use App\Models\JobDetailsDB;
use App\Models\ProductDB;
use App\Models\ProductTypeDB;
use App\Models\TeamsDB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use LaravelQRCode\Facades\QRCode;
use Product;
use Intervention\Image\Facades\Image;
use Teams;

// use Illuminate\Support\Facades\Image;

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

        // Get the staff IDs from the request
        $staff_ids = $request->staf_ids;

        // Check if there's an existing team with the same users
        $existing_group_id = null;

        // Get all unique group IDs from TeamsDB
        $all_groups = TeamsDB::select('group_id')
            ->where('group_id', '>', 0)
            ->groupBy('group_id')
            ->get();

        foreach ($all_groups as $group) {
            // Get all users in this group
            $group_users = TeamsDB::where('group_id', $group->group_id)
                ->pluck('user_id')
                ->toArray();

            // Check if the number of users match
            if (count($group_users) == count($staff_ids)) {
                // Check if all users in the request are in this group
                $all_users_match = true;
                foreach ($staff_ids as $staff_id) {
                    if (!in_array($staff_id, $group_users)) {
                        $all_users_match = false;
                        break;
                    }
                }

                if ($all_users_match) {
                    $existing_group_id = $group->group_id;
                    break;
                }
            }
        }

        // If an existing group was found, use it; otherwise, create a new group
        if ($existing_group_id != NULL) {
            $group_id = $existing_group_id;
        } else {
            $group_id = 1;
            $lastTeam = TeamsDB::where('id', '>', 0)->orderBy('id', 'desc')->first();
            if ($lastTeam) {
                $group_id = $lastTeam->group_id + 1;
            }

            // Create new team entries
            foreach ($staff_ids as $staf_id) {
                $team = new TeamsDB();
                $team->group_id = $group_id;
                $team->user_id = $staf_id;
                $team->save();
            }
        }

        // Update products with the team ID
        $products = ProductDB::whereIn('id', $ids)->get();
        foreach ($products as $product) {
            $product->is_available = 0;
            $product->team_id = $group_id;
            $product->save();
        }

        return redirect(URL::To('/integration'))->with('success', 'Berhasil memproses produk');
    }
    public function close(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $ids = [];
        foreach ($request->id as  $value) {
            array_push($ids, $value);
        }
        $products =  ProductDB::whereIn('id', $ids)->get();
        foreach ($products as $product) {
            $product->is_available = 1;
            $product->user_id = 0;
            $product->team_id = 0;
            $product->save();
        }
        return redirect(URL::To('/integration-menu'))->with('success', 'Berhasil memproses produk');
    }
    public function integration(Request $request)
    {
        $data = $request->all();

        return view('page.integration.input', ['title' => 'integration']);
    }
    public function menu(Request $request)
    {
        $data = $request->all();

        return view('page.integration.menu', ['title' => 'integration']);
    }
    public function closeIntegration(Request $request)
    {
        $data = $request->all();

        return view('page.integration.close', ['title' => 'integration']);
    }
    public function file_get_contents_curl($url)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    public function generateQr(Request $request)
    {

        $user =         User::where('qr', $request->qr)->first();
        if ($user->qr == $user->mobile_token) {
            # code...
            $url = 'https://quickchart.io/qr?text=' . $request->qr . '&size=250&caption=STN Multimedia';
            copy($url, 'assets/img/qr/' . $request->qr . '.png');

            $user =         User::where('qr', $request->qr)->first();
            $user->mobile_token = 'assets/img/' . $request->qr . '.png';
            $user->save();
        }
        return response()->download($user->mobile_token);
        // return $this->forceDownloadQR('https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=test123');
        // // $contents = file_get_contents($url);
        // // $name = substr($url, strrpos($url, '/') + 1);
        // // $file =  QRCode::text($request->qr)->setSize(10)->png();
        // // $contents = file_get_contents($url);
        // // // dd($contents);
        // // Storage::put('hahahaname', $contents);
        // // // $info = pathinfo($url);
        // // // $contents = file_get_contents($url);
        // // // $file = '/img/' . $request->qr;
        // // // file_put_contents($file, $contents);
        // // // $uploaded_file = new UploadedFile($file, $info['basename']);
        // // $url = 'https://pay.google.com/about/static/images/social/og_image.jpg';
        // $info = pathinfo($url);
        // $contents = file_get_contents($url);
        // $file =  $info['basename'];
        // file_put_contents($file, $contents);
        // $uploaded_file = new UploadedFile($file, $info['basename']);
        // dd($uploaded_file);
        // $response = Response::make($file);
        // $response->header('Content-Type', "image/png");

        // return $response;
        //  $contents = file_get_contents($file);
        // $storage_disk = 'public' ;
        // Storage::disk($storage_disk)->put('filename.png', $file);

        // return 'S';

        // Image::make($file)->save();

        // return FacadesQrCode::text($request->qr)->png();
        // return QRCode::text($request->qr)->png();


        // $file =  QRCode::text($request->qr)->setSize(10)->png();
        // // $response = Response::make($file);
        // // $response->header('Content-Type', "image/png");
        // // return $response;


        // // return  QRCode::text($request->qr)->setSize(10)
        //     // ->setOutfile('/path/to/email-qr-code.png')
        //     // ->png();

        // //         $png = base64_encode($file);

        // $path = public_path() . 'img/designs/' . $request->qr;

        // $img = Image::make(($file));

        // $img->save('public/bar.png');

        // $image = file_get_contents("https://api.qrserver.com/v1/create-qr-code/?data=HelloWorld&amp;size=100x100");


        // // file_put_contents(public_path('img/a.png'), $image);


        // $data = $this->file_get_contents_curl($image);
        // file_put_contents('/img/testing' . 'test.png', $data); 

        // return response()->streamDownload(function () {
        //     file_put_contents('test.png', 'https://api.qrserver.com/v1/create-qr-code/?data=HelloWorld&amp;size=100x100');
        // });
        // // return response()->download("https://api.qrserver.com/v1/create-qr-code/?data=HelloWorld&amp;size=100x100");




        //=========================

        //         // return FacadesQrCode::text($request->qr)->png();
        //         // return QRCode::text($request->qr)->png();

        //         $image = QrCode::text($request->qr)
        //             // ->merge('img/t.jpg', 0.1, true)
        //             ->setSize(200)
        //             // ->errorCorrection('H')
        //             // ->generate($request->qr)
        //             ->png();

        //         $png = base64_encode($image);
        //         return  response()->download($png);
        //         // $output_file = '/img/qr-code/img-' . time() . '.png';

        //         // Storage::disk('local')->put($output_file, base64_decode($png));
        //         // $response = Response::make($image);
        //         // $response->header('Content-Type', "image/png");
        //         // Storage::put('file.jpg', $png);
        //         // Storage::disk('local')->put($output_file, $png);

        //         // $file = 'generated_qrcodes/' . $request->qr . '.png';



        //         // // $newqrcode = QrCode::text('message')
        //         // // ->setSize(10)
        //         // // ->setMargin(2)
        //         // // ->setOutfile($file)
        //         // // // ->generate('ItSolutionStuff.com')
        //         // // ->png();

        //         // QRCode::text($request->qr)->setSize(10)->generate() ->png();

        //         // // if ($newqrcode) {
        //         //     $input['qrcode_path'] = $file;

        //     // // //     $file=  QRCode::text($request->qr)->setSize(10)->png();

        //     // // //     // if ($request->hasFile('image')) {
        //     // // //         // $randomize = rand(111111, 999999);
        //     // // //         // $extension = $file->getClientOriginalExtension();
        //     // // //         $filename = $request->qr;
        //     // // //         $image = $file->store('images', $filename);
        //     // // //     // }
        //     // // // $user =         User::where('qr', $request->qr)->first();
        //     // // // $user->mobile_token = $image;
        //     // // // $user->save();

        //     // // // return response()->download($image);

        //         // $response = Response::make($file);
        //         // $response->header('Content-Type', "image/png");


        //         // $file = public_path() . "/download/info.pdf";

        //         // $headers = array(
        //         //     'Content-Type: image/png',
        //         // );

        //         // return Response::download(
        //         //     $response,
        //         //     'filename.pdf',
        //         //     $headers
        //         // );
        //         // return  response()->download($response);
        // //         $path = public_path('uploads/image/');


        //=========================
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
        $queries = ProductDB::where(function ($query) use ($request) {
            $query->where('product_name', 'LIKE', "%$request->q%")->orWhere('code', 'LIKE', "%$request->q%");
        })
            ->where('is_available', 1)

            ->take(5)->get();
        $results = array();
        foreach ($queries as $query) {

            $results[] = [
                'id' => $query->id,
                'code' => $query->code,
                'product_name' => $query->product_name,
                'is_consumable' => $query->is_consumable == 1 ? 'Yes' : 'No',
                'is_available' => $query->is_available == 1 ? 'Available' : 'Not Available',
                'status' => $query->status
            ]; //you can take custom values as you want
        }
        return response()->json($results);
    }
    public function autoCompleteUser(Request $request)
    {
        $q = $request->q;
        $queries = User::where('name', 'LIKE', "%$request->q%")->orWhere('email', 'LIKE', "%$request->q%")->orWhere('phone', 'LIKE', "%$request->q%")->take(5)->get();
        $results = array();
        foreach ($queries as $query) {

            $results[] = ['id' => $query->id, 'email' => $query->email, 'name' => $query->name, 'phone' => $query->phone, 'name' => $query->name]; //you can take custom values as you want
        }
        return response()->json($results);
    }
    public function autoCompleteCategory(Request $request)
    {
        $q = $request->q;
        $queries = ProductTypeDB::where('category', 'LIKE', "%$request->q%")->groupBy('category')->select('category')->take(5)->get();
        $results = array();
        foreach ($queries as $query) {

            $results[] = ['name' => $query->category]; //you can take custom values as you want
        }
        return response()->json($results);
    }
    public function autoCompleteBrand(Request $request)
    {
        $q = $request->q;
        $queries = ProductTypeDB::where('brand', 'LIKE', "%$request->q%")->groupBy('brand')->select('brand')->take(5)->get();
        $results = array();
        foreach ($queries as $query) {

            $results[] = ['name' => $query->brand]; //you can take custom values as you want
        }
        return response()->json($results);
    }
    public function autoCompleteType(Request $request)
    {
        $q = $request->q;
        $queries = ProductTypeDB::where('type', 'LIKE', "%$request->q%")->groupBy('type')->select('type')->take(5)->get();
        $results = array();
        foreach ($queries as $query) {

            $results[] = ['name' => $query->type]; //you can take custom values as you want
        }
        return response()->json($results);
    }
    public function autoCompleteQr(Request $request)
    {
        $text = $request->text;
        $results = array();
        $query = ProductDB::where('qr_string', 'LIKE', "%$request->text%")
            // ->where('is_available', 1)
            ->first();
        if ($query) {
            $query->type = 'product';
            $query->is_consume = $query->is_consumable == 1 ? 'Yes' : 'No';
            $query->available = $query->is_available == 1 ? 'Available' : 'Not Available';

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
