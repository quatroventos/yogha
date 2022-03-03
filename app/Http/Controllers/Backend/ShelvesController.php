<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shelves;
use Illuminate\Support\Facades\Validator;

class ShelvesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $shelves = \DB::table('shelves')
            ->select('shelves.*','shelf_filters.title as filterTitle','shelf_layouts.title as layoutTitle')
            ->join('shelf_filters','shelf_filters.id','=','shelves.shelfFilterId')
            ->join('shelf_layouts','shelf_layouts.id','=','shelves.shelfLayoutId')
            ->orderby('position', 'asc')
            ->get();
        //dd($shelves);
        return view('admin.shelves.index', compact('shelves'));
    }


    public function edit(Request $request)
    {
        $filters = \DB::table('shelf_filters')->select('*')->get();
        $layouts = \DB::table('shelf_layouts')->select('*')->get();
        return view('admin.shelves.edit', compact('filters', 'layouts'));
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
            'position' => ['required', 'integer', 'min:1'],
            'limit' => ['required', 'integer', 'min:1'],
            'shelfLayoutId' => ['required', 'integer', 'min:1'],
            'shelfFiltertId' => ['required', 'integer', 'min:1']
        ]);
    }

    /**
     * Cria nova prateleira
     *
     * @param  array  $data
     * @return \App\Models\Shelves
     */
    protected function create(Request $request)
    {

        $shelf = new Shelves;
        $shelf->title = $request->title;
        $shelf->position = $request->position;
        $shelf->limit = $request->limit;
        $shelf->shelfLayoutId = $request->shelfLayoutId;
        $shelf->shelfFilterId = $request->shelfFilterId;
        $shelf->save();

        return redirect()->back()->with('success', 'Prateleira cadastrada!');
    }
}
