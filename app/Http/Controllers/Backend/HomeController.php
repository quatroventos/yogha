<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Home::first();
        return view('admin.home.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        if($request->headerimage != ""){
            $headerimagefile = time().'.'.$request->headerimage->extension();
            $request->headerimage->move(public_path('uploads'), $headerimagefile);
        }else{
            $headerimagefile = $request->oldheaderimage;
        }

        if($request->banner_image != ""){
            $bannerimagefile = time().'.'.$request->banner_image->extension();
            $request->banner_image->move(public_path('uploads'), $bannerimagefile);
        }else{
            $bannerimagefile = $request->oldbanner_image;
        }



        $data = [
            'headerimage' => $headerimagefile,
            'shelf1_title' => $request->shelf1_title,
            'shelf1_content' => $request->shelf1_content,
            'shelf2_title' => $request->shelf2_title,
            'shelf2_content' => $request->shelf2_content,
            'shelf3_title' => $request->shelf3_title,
            'shelf3_content' => $request->shelf3_content,
            'shelf4_title' => $request->shelf4_title,
            'shelf4_content' => $request->shelf4_content,
            'shelf5_title' => $request->shelf5_title,
            'shelf5_content' => $request->shelf5_content,
            'banner_title' => $request->banner_title,
            'banner_text' => $request->banner_text,
            'banner_image' => $bannerimagefile,
            'banner_link' => $request->banner_link,
            'banner_cta' => $request->banner_cta,
        ];

        Home::where('id', 1)->update($data);

        return redirect()->back()->with('success', 'Home atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
