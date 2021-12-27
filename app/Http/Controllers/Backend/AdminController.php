<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Accommodations;
use App\Models\Services;
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

        //todo: criar lista agrupada por data para grafico de reservas.
//        $bookingStats = \DB::table('avantio.booking_lists')

//            ->where('occuppationalrules.AccommodationId','=', $accommodation[0]->AccommodationId)
//            ->get();


        return view('admin.dashboard', compact(
            'accommodations',
            'services',

        ));
    }
}
