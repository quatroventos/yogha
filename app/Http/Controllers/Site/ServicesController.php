<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;

class ServicesController extends Controller
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

    public function index()
    {
        $services = Services::all();

        return view('site.services.index', compact('services'));
    }

    public function show_details($serviceid)
    {
        $service = Services::where('id', $serviceid)->first();

        return view('site.services.service_details', compact('service'));
    }



}
