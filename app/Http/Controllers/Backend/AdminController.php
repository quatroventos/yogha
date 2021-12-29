<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Accommodations;
use App\Models\Services;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $accommodations = Accommodations::count();
        $services = Services::count();
        $users = User::count();

        $bookingStats = \DB::table('avantio.booking_lists')->get();
        //dd($bookingStats);


        return view('admin.dashboard', compact(
            'accommodations',
            'services',
            'users'
        ));
    }
}
