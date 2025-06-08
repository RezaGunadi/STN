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
use Illuminate\Support\Facades\DB;
use App\Models\HistoriesDB;
use App\Models\Integration;
use Illuminate\Support\Facades\Log;
use App\Helpers\ToastHelper;
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
            $randomName = \Illuminate\Support\Str::random(5);
            $lastTeam = TeamsDB::where('id', '>', 0)->orderBy('id', 'desc')->first();
            if ($lastTeam) {
                $group_id = $lastTeam->group_id + 1;
            }

            // Create new team entries
            foreach ($staff_ids as $staf_id) {
                $team = new TeamsDB();
                $team->name = 'Team ' . $randomName;
                $team->group_id = $group_id;
                $team->user_id = $staf_id;
                $team->save();
            }
        }

        // Update products with the team ID
        $products = ProductDB::whereIn('id', $ids)->get();
        foreach ($products as $product) {
            // Track old values for history
            $oldIsAvailable = $product->is_available;
            $oldTeamId = $product->team_id;
            $additionalData = $product->toArray();

            $product->is_available = 0;
            $product->team_id = $group_id;
            $product->save();

            // Create history entries
            $history = new HistoriesDB();
            $history->input(
                $product->id,
                'product',
                'update',
                $oldIsAvailable,
                0,
                'is_available',
                $additionalData
            );
            $history->input(
                $product->id,
                'product',
                'update',
                $oldTeamId,
                $group_id,
                'team_id',
                $additionalData
            );
        }
        // // Record history
        // HistoriesDB::create([
        //     'ref_id' => $product->id,
        //     'created_by' => Auth::id(),
        //     'ref_type' => 'update_products',
        //     'desc' => "Updated products for group ID: $group_id",
        //     'data' => [
        //         'group_id' => $group_id,
        //         'product_ids' => implode(',', $ids),
        //         'old_status' => 'Available',
        //         'new_status' => 'Unavailable'
        //     ]
        // ]);

        ToastHelper::success('Berhasil memproses produk');
        return redirect(URL::To('/integration'));
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
            // Track old values for history
            $oldIsAvailable = $product->is_available;
            $oldUserId = $product->user_id;
            $oldTeamId = $product->team_id;
            $additionalData = $product->toArray();

            $product->is_available = 1;
            $product->user_id = 0;
            $product->team_id = 0;
            $product->save();

            // Create history entries
            $history = new HistoriesDB();
            $history->input(
                $product->id,
                'product',
                'update',
                $oldIsAvailable,
                1,
                'is_available',
                $additionalData
            );
            $history->input(
                $product->id,
                'product',
                'update',
                $oldUserId,
                0,
                'user_id',
                $additionalData
            );
            $history->input(
                $product->id,
                'product',
                'update',
                $oldTeamId,
                0,
                'team_id',
                $additionalData
            );
        }

        // // Record history
        // HistoriesDB::create([
        //     'user_id' => Auth::id(),
        //     'action' => 'update_products',
        //     'desc' => "Updated products for group ID: 0",
        //     'data' => [
        //         'group_id' => 0,
        //         'product_ids' => implode(',', $ids),
        //         'old_status' => 'Unavailable',
        //         'new_status' => 'Available'
        //     ]
        // ]);

        ToastHelper::success('Berhasil memproses produk');
        return redirect(URL::To('/integration-menu'));
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
        try {
            $user = User::where('qr', $request->qr)->first();
            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }

            if ($user->qr == $user->mobile_token || $user->mobile_token == null) {
                // Properly encode the QR code text
                $encodedQr = urlencode($request->qr);
                $url = 'https://quickchart.io/qr?text=' . $encodedQr . '&size=250&caption=STN%20Multimedia';

                // Create directory if it doesn't exist
                $directory = public_path('assets/img/qr');
                if (!file_exists($directory)) {
                    mkdir($directory, 0777, true);
                }

                $filePath = $directory . '/' . $request->qr . '.png';
                $publicPath = 'assets/img/qr/' . $request->qr . '.png';

                // Download and save QR code with error handling
                $qrContent = @file_get_contents($url);
                if ($qrContent === false) {
                    throw new \Exception('Failed to generate QR code');
                }
                file_put_contents($filePath, $qrContent);

                // Update user record
                $user->mobile_token = $publicPath;
                $user->save();
            }

            // Check if file exists before downloading
            $downloadPath = public_path($user->mobile_token);
            if (file_exists($downloadPath)) {
                return response()->download($downloadPath);
            }

            return response()->json(['error' => 'QR code file not found'], 404);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('QR Generation Error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to generate QR code: ' . $e->getMessage()], 500);
        }
    }
    public function generateQrproduct(Request $request)
    {
        $product = ProductDB::where('qr_string', $request->qr)->first();

        if ($product->qr == $product->qr_string || $product->qr == null) {
            // Create directory if it doesn't exist
            $directory = public_path('assets/img/qr');
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            $url = 'https://quickchart.io/qr?text=' . $request->qr . '&size=250&caption=STN Multimedia';
            $filePath = $directory . '/' . $request->qr . '.png';

            // Download and save QR code
            file_put_contents($filePath, file_get_contents($url));

            // Update product record
            $product->qr = 'assets/img/qr/' . $request->qr . '.png';
            $product->save();
        }

        return response()->download(public_path($product->qr));
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
    public function autoCompleteProductEvent(Request $request)
    {

        $term = $request->q;
        $queries = ProductDB::where(function ($query) use ($request) {
            $query->where('product_name', 'LIKE', "%$request->q%")->orWhere('code', 'LIKE', "%$request->q%");
        })
            // ->where('is_available', 1)

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
        try {
            if (!Auth::check()) {
                return response()->json(['error' => 'Unauthenticated'], 401);
            }

            $user = Auth::user();
            if ($user->role == 'user' || $user->role == '' || $user->role == null) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }

            $q = $request->q;
            if (empty($q)) {
                return response()->json([]);
            }

            $queries = User::where('name', 'LIKE', "%$q%")
                ->orWhere('email', 'LIKE', "%$q%")
                ->orWhere('phone', 'LIKE', "%$q%")
                ->take(5)
                ->get();

            $results = $queries->map(function ($query) {
                return [
                    'id' => $query->id,
                    'email' => $query->email,
                    'name' => $query->name,
                    'phone' => $query->phone
                ];
            });

            return response()->json($results);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error in autoCompleteUser: ' . $e->getMessage());
            return response()->json(['error' => 'Internal server error'], 500);
        }
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

    public function index()
    {
        $integrations = Integration::all();
        return view('integrations.index', compact('integrations'));
    }

    public function create()
    {
        return view('integrations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'config' => 'required|json',
            'description' => 'nullable|string'
        ]);

        $integration = Integration::create($request->all());

        // Record history
        HistoriesDB::create([
            'ref_id' => $integration->id,
            'created_by' => Auth::id(),
            'ref_type' => 'create_integration',
            'desc' => "Created new integration '{$integration->name}' of type '{$integration->type}'",
            'data' => [
                'integration_id' => $integration->id,
                'name' => $integration->name,
                'type' => $integration->type,
                'status' => $integration->status
            ]
        ]);

        return redirect()->route('integrations.index')
            ->with('success', 'Integration created successfully.');
    }

    public function show(Integration $integration)
    {
        return view('integrations.show', compact('integration'));
    }

    public function edit(Integration $integration)
    {
        return view('integrations.edit', compact('integration'));
    }

    public function update(Request $request, Integration $integration)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'config' => 'required|json',
            'description' => 'nullable|string'
        ]);

        $oldStatus = $integration->status;
        $integration->update($request->all());

        // Record history
        HistoriesDB::create([
            'ref_id' => $integration->id,
            'created_by' => Auth::id(),
            'ref_type' => 'update_integration',
            'desc' => "Updated integration '{$integration->name}' status from '{$oldStatus}' to '{$integration->status}'",
            'data' => [
                'integration_id' => $integration->id,
                'name' => $integration->name,
                'old_status' => $oldStatus,
                'new_status' => $integration->status
            ]
        ]);

        return redirect()->route('integrations.index')
            ->with('success', 'Integration updated successfully.');
    }

    public function destroy(Integration $integration)
    {
        // Record history before deletion
        HistoriesDB::create([
            'ref_id' => $integration->id,
            'created_by' => Auth::id(),
            'ref_type' => 'delete_integration',
            'desc' => "Deleted integration '{$integration->name}' of type '{$integration->type}'",
            'data' => [
                'integration_id' => $integration->id,
                'name' => $integration->name,
                'type' => $integration->type,
                'status' => $integration->status
            ]
        ]);

        $integration->delete();

        return redirect()->route('integrations.index')
            ->with('success', 'Integration deleted successfully.');
    }

    public function sync(Integration $integration)
    {
        // Perform sync operation
        $result = $integration->sync();

        // Record history
        HistoriesDB::create([
            'ref_id' => $integration->id,
            'created_by' => Auth::id(),
            'ref_type' => 'sync_integration',
            'desc' => "Synchronized integration '{$integration->name}'",
            'data' => [
                'integration_id' => $integration->id,
                'name' => $integration->name,
                'sync_result' => $result
            ]
        ]);

        return redirect()->route('integrations.index')
            ->with('success', 'Integration synchronized successfully.');
    }
}
