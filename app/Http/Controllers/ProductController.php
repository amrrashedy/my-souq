<?php

namespace App\Http\Controllers;

use App\product;
use App\productImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$products = product::get();
        $products = product::orderBy("id" ,"desc")->paginate(20);

        return view('products.show_all' )
       // ->with("prods" , $products)
       ->with(compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" =>"required" ,
        ]);

        // dd($request->name);
        //dd($request->input("name" ));
        //  dd($request->input("namee"  ,"xxx"));
        //dd($request->only(["name"  ,"qty"]));
        //dd($request->except(["name"  ,"qty"]));
        //dd($request->all());
        //$product =   product::create($request->all());
        $product =   product::create($request->except(["image"]));
        //dd(       $product );

        $product_image = new productImage();

        $product_image->image = $request->file("image")->store("/images/products") ;
        $product_image->product_id =$product->id ;

        $product_image->save();
        return redirect()->back();    
    }


    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}
