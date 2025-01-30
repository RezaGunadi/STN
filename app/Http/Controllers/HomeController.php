<?php

namespace App\Http\Controllers;

use App\Models\JobsDB;
use App\Models\ProductDB;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
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
    public function index(Request $request)
    {
        $user = User::where('email', '!=', 'rezagunadi97@gmail.com')->count();
        if ($user == 1 || Auth::user()->email == 'rezagunadi97@gmail.com') {
            $user = User::where('id', Auth::user()->id)->first();
            $user->status = 'active';
            $user->role = 'owner';
            $user->save();
        }
        if (Auth::user()->status == 'active' || Auth::user()->status == 'aktif') {
            # code...
            // dd(Auth::user()->status);
            $startDate = Carbon::now()->subDays(30)->format('Y-m-d H:i:s');
            $endDate = Carbon::now()->format('Y-m-d H:i:s');
            if ($request->has('start_date')) {
                if ($request->start_date != '') {
                    # code...
                    $startDate = Carbon::parse($request->start_date)->format('Y-m-d').' 00:00:00';
                }
                # code...
            }
            if ($request->has('end_date')) {
                if ($request->end_date != '') {
                    # code...
                    $endDate = Carbon::parse($request->endt_date)->format('Y-m-d') . ' 23:59:59';
                }
                # code...
            }
            $allProduct =  ProductDB::get();
            $categoryProduct =  ProductDB::groupBy('category')->select('category', DB::raw('count(*) as total'))->get();
            $brandProduct =  ProductDB::groupBy('brand')->select('brand', DB::raw('count(*) as total'))->get();
            $nonConsumableProduct =  ProductDB::join('job_details', 'job_details.id_product', '=', 'product.id')->where('product.is_consumable', 0)
            ->select(
                DB::raw('sum(job_details.day_finished) AS total'),
                'product.category',
                'product.brand',
            )->where('job_details.created_at', '>=', $startDate)
            ->where('job_details.updated_at', '<=', $endDate)
            ->groupBy( 'product.category', 'product.brand')
            ->get();
            // dd($nonConsumableProduct->toArray());
            $consumableProduct =  ProductDB::join('job_details', 'job_details.id_product', '=', 'product.id')->where('product.is_consumable', 1)
            ->select(
                DB::raw('count(product.id) AS total'),
                'product.category',
                'product.brand',
            )->where('job_details.created_at', '>=', $startDate)
            ->where('job_details.updated_at', '<=', $endDate)
            ->groupBy('product.category', 'product.brand')
            ->get();
            $report = User::join('report', 'report.user_id', '=', 'users.id')->select(
                DB::raw('sum(report.price) AS total'),
                'users.id',
                'users.name',
                'users.email',
                'users.phone',
            )->where('report.created_at', '>', $startDate)
                ->groupBy(
                    'users.id',
                    'users.name',
                    'users.email',
                    'users.phone',
                )
                ->where('report.updated_at', '<', $endDate)->get();
            $job = JobsDB::where('jobs.created_at', '>', $startDate)
            ->join('users', 'users.id','=', 'jobs.starter_user_id')
            ->groupBy('users.id', 'users.name',)
            ->where('jobs.updated_at', '<', $endDate)
            ->select(
                'users.id',
                'users.name',
                DB::raw('count(jobs.id) AS total') )
            ->get();
            // dd($categoryProduct);
            return view('home', [
                'title' => 'dashboard',
                'all_product' => $allProduct,
                'category_product' => $categoryProduct,
                'brand_product' => $brandProduct,
                'non_consumable_product' => $nonConsumableProduct,
                'consumable_product' => $consumableProduct,
                'report' => $report,
                'job' => $job,



            ]);
        } else {
            Auth::logout();

            return Redirect(route('login'))->with('error', 'Akun anda belum di aktivasi, Harap hubungi Admin STN');
            # code...
        }
    }
    public function qrScanner()
    {
        return view('qr');
    }
}
