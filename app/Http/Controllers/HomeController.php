<?php

namespace App\Http\Controllers;

use App\Models\JobsDB;
use App\Models\ProductDB;
use App\Models\User;
use App\Models\JobDetailsDB;
use App\Models\TeamsDB;
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
        // Remove auth middleware from constructor since we want to allow public access
    }

    /**
     * Show the application home page.
     * This is the default landing page for all users (logged in or not)
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // If user is not logged in, show the user home page
        if (!Auth::check()) {
            return view('page.user.home', ['title' => 'Welcome to STN']);
        }

        // Check user status
        if (Auth::user()->status != 'active' && Auth::user()->status != 'aktif') {
            Auth::logout();
            return Redirect(route('login'))->with('error', 'Akun anda belum di aktivasi, Harap hubungi Admin STN');
        }

        // Role-based redirection
        if (Auth::user()->role == 'user' || Auth::user()->role == '' || Auth::user()->role == null) {
            return redirect()->route('user_dashboard');
        }

        // For admin/owner, show the admin dashboard
        return $this->adminDashboard();
    }

    /**
     * Show the user home page.
     * This is the public landing page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userHome()
    {
        return view('page.user.home', ['title' => 'Welcome to STN']);
    }

    /**
     * Show the admin dashboard.
     * This is protected and only accessible to admin/owner
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    private function adminDashboard()
    {
        $startDate = Carbon::now()->subDays(30)->format('Y-m-d H:i:s');
        $endDate = Carbon::now()->format('Y-m-d H:i:s');

        $allProduct = ProductDB::get();
        $categoryProduct = ProductDB::groupBy('category')->select('category', DB::raw('count(*) as total'))->get();
        $brandProduct = ProductDB::groupBy('brand')->select('brand', DB::raw('count(*) as total'))->get();

        $nonConsumableProduct = ProductDB::join('job_details', 'job_details.id_product', '=', 'product.id')
            ->where('product.is_consumable', 0)
            ->select(
                DB::raw('sum(job_details.day_finished) AS total'),
                'product.category',
                'product.brand',
            )
            ->where('job_details.created_at', '>=', $startDate)
            ->where('job_details.updated_at', '<=', $endDate)
            ->groupBy('product.category', 'product.brand')
            ->get();

        $consumableProduct = ProductDB::join('job_details', 'job_details.id_product', '=', 'product.id')
            ->where('product.is_consumable', 1)
            ->select(
                DB::raw('count(product.id) AS total'),
                'product.category',
                'product.brand',
            )
            ->where('job_details.created_at', '>=', $startDate)
            ->where('job_details.updated_at', '<=', $endDate)
            ->groupBy('product.category', 'product.brand')
            ->get();

        $report = User::join('report', 'report.user_id', '=', 'users.id')
            ->select(
                DB::raw('sum(report.price) AS total'),
                'users.id',
                'users.name',
                'users.email',
                'users.phone',
            )
            ->where('report.created_at', '>', $startDate)
            ->groupBy(
                'users.id',
                'users.name',
                'users.email',
                'users.phone',
            )
            ->where('report.updated_at', '<', $endDate)
            ->get();

        $users = User::whereIn('status', ['active', 'aktif'])
            ->whereIn('role', ['admin', 'staff', 'gudang'])
           
            ->get();
            foreach ($users as $user) {
                $myTeam = TeamsDB::where('user_id', $user->id)->pluck('group_id');
                # code...
                $totalPerform = 0 ;
                $Perfomance = JobsDB::whereIn('starter_team_id', $myTeam)
                    ->where('start_date', '>=', $startDate)
                    ->where('start_date', '<=', $endDate)
                    ->get();
                    foreach ($Perfomance as $perfomance) {
                        $team = TeamsDB::where('group_id', $perfomance->starter_team_id)->count();
                        $totalPerform += (($perfomance->total_price*0.7)/$team );
                    }
                $PerfomanceClose = JobsDB::whereIn('closer_team_id', $myTeam)
                    ->where('finish_date', '>=', $startDate)
                    ->where('finish_date', '<=', $endDate)
                    ->get();
                    foreach ($PerfomanceClose as $perfomance) {
                        $team = TeamsDB::where('group_id', $perfomance->closer_team_id)->count();
                        $totalPerform += (($perfomance->total_price*0.3)/$team );
                    }
                    $user->perfomance = $totalPerform;
            }
        return view('home', [
            'title' => 'Admin Dashboard',
            'all_product' => $allProduct,
            'category_product' => $categoryProduct,
            'brand_product' => $brandProduct,
            'non_consumable_product' => $nonConsumableProduct,
            'consumable_product' => $consumableProduct,
            'report' => $report,
            'users' => $users,
        ]);
    }

    public function qrScanner()
    {
        return view('qr', ['title' => 'QR Scanner']);
    }
}
