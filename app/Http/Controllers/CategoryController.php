<?php

namespace App\Http\Controllers;

use App\category;
use App\subCategory;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('products.category');

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

        // validation

        $rslt = $request->validate([
            "name" => "required|min:2|max:191|unique:categories",
            
        ]);

        $cat=new category();
        if($request->has('name')){
            $cat->name=$request->input('name');
            $cat->save();
           // session()->flash('msg','Save Successfully');
            session()->flash('cat',$cat);

         //   session()->put('msg','Save Successfully');

        }
       


        return redirect()->back();

    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id=$request->input('edit_id');      
        $cat=category::find($id);
        $cat->name=$request->input('edit_name');      
        //$cat->name=$request->input('name_category');
        $cat->update();
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat=category::find($id);
        $cat->delete();
        return redirect()->back();

    }


    function get_sub_cats(Request $request)
    {
        if($request->has("category_id"))
        {
          //  return subCategory::where("category_id" ,$request->category_id)->get();

            $cat =category::find($request->category_id);
            return $cat->sub_categories_one_to_many;

        }else {
            return subCategory::all();
        }
    }
}
