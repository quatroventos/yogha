<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use Illuminate\Support\Facades\Validator;

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

        return view('admin.services.index', compact('services'));
    }

    public function edit(Request $request)
    {
        $avantioServices = \DB::table('avantio.services')
            ->select('id', 'name')
            ->get();

        return view('admin.services.edit', compact('avantioServices'));
    }

    /**
     * Valida campos enviados
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'min:1'],
            'avantioServiceId' => ['required', 'integer', 'min:1'],
            'description' => ['required', 'srting', 'min:3'],
            'file' => 'required|jpg, png, gif|max:2048',

        ]);
    }

    /**
     * Cria novo Serviço
     *
     * @param  array  $data
     * @return \App\Models\Services
     */
    protected function create(Request $request)
    {

        //armazena arquivo no dir public
        //$path = $request->file('image')->store('/public/files');

        if ($image = $request->file('image')) {
            $destinationPath = 'files/services/';
            $imagefile = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $imagefile);
        }

        $service = new Services;
        $service->title = $request->title;
        $service->price = $request->price;
        $service->avantioServiceId = $request->avantioServiceId;
        $service->description = $request->description;
        $service->image = $imagefile;
        $service->save();

        return redirect()->back()->with('success', 'Serviço cadastrado!');
    }

}
