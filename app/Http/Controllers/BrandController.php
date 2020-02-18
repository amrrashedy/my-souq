<?php

namespace App\Http\Controllers;

use App\brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('products.brand');

      
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
        

        $rslt = $request->validate([
            "name" => "required|min:2|max:191|unique:brands",
            "img"=>"nullable|image"
            
        ]);



        if ($request->has('img')){
            $file=Storage::disk('public')->put("/images/brands",$request->file('img'));
            brand::create(["name"=>$request->input('name'),"img"=>$file]);
        }        else{
            brand::create(["name"=>$request->input('name')]);
        }    
      
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $id=$request->input('edit_id');      
        $brand=brand::find($id);
        Storage::disk('public')->delete($brand->img);
        $brand->name=$request->input('edit_name');    
       // $file= Storage::put("brands",$request->input('img'));
        $file=Storage::disk('public')->put("images/brands",$request->file('edit_img')); 
               
         $brand->img=$file;



        $brand->update();
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $brand=brand::find($id);
        Storage::disk('public')->delete($brand->img);

        $brand->delete();
        return $brand;
    }
}
