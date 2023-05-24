<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\sections;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function index()
    {
        $section=sections::all();
        $product=products::all();
        return view('products.products',compact('section','product'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        products::create([
            'product_name'=>$request->product_name,
            'section_id'=>$request->section_id,
            'description'=>$request->description,
        ]);
        session()->flash('Add','تمت عملية الحفظ بنجاح');
        return redirect('/products');
    }


    public function show(products $products)
    {
        //
    }


    public function edit(products $products)
    {
        //
    }


    public function update(Request $request)
    {

      $id=sections::where('section_name',$request->section_id)->first()->id;
      $product=products::findOrFail($request->id);
      $product->update([
        'product_name'=>$request->product_name,
        'description'=>$request->description,
        'section_id'=>$id,
      ]);
      session()->flash('Edit', 'تم تعديل المنتج بنجاح');
      return back();
    }


    public function destroy(Request $request)
    {
       $id=products::findOrFail($request->id);
       $id->delete();
       session()->flash('delete', 'تم حذف المنتج بنجاح');
       return back();
    }
}
