<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Models\Stats;
use Illuminate\Http\Request;
use App\Models\Services;

class ServicesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {
        $services = Services::all();

        return view('site.services.index', compact('services'));
    }

    public function show_details($serviceid)
    {
        //insere nas estatísticas
        $stat = new Stats;
        $stat->type = 'service';
        $stat->content_id = $accommodationid;
        $stat->save();

        $service = Services::where('id', $serviceid)->first();

        return view('site.services.service_details', compact('service'));
    }



}
