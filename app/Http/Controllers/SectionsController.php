<?php

namespace App\Http\Controllers;

use App\Models\sections;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInvoices;

class SectionsController extends Controller
{

    public function index()
    {
        $section=sections::all();
        return view('sections.sections',compact('section'));
    }

    public function create()
    {
        //
    }

    public function store(StoreInvoices $request)
    {
        //لعمل validate
    //    $input=$request->all();
    //    $n_exists=sections::where('section_name','=',$input['section_name'])->exists();

    //    if($n_exists)
    //    {
    //     session()->flash('Error','القسم مسجل مسبقا');
    //     return redirect('/sections');
    //    }

    //    else
    //    {

        sections::create([
            'section_name'=>$request->section_name,
            'description'=>$request->description,
            'crated_by'=>(Auth::user()->name),
        ]);
        session()->flash('Add','تم اضافة القسم بنجاح');
        return redirect('/sections');

    }

    public function show(sections $sections)
    {
        //
    }


    public function edit(sections $sections)
    {
        //
    }


    public function update(Request $request)
    {
        $id=$request->id;
        $this->validate($request,[
            'section_name'=>'required|unique:sections,section_name,'.$id,
        ],[
            'section_name.required'=>'اسم القسم مطلوب يرجى ادخالة',
            'section_name.unique'=>'اسم القسم موجود مسبقا استخدم اسم اخر',

        ]);
        $section=sections::find($id);
        $section->update([
            'section_name'=>$request->section_name,
            'description'=>$request->description,
        ]);
        session()->flash('edit','تم التعديل بنجاح');
        return redirect('/sections');
    }


    public function destroy(Request $request)
    {
        $section=$request->id;
        // sections::find($section)->delete();
        sections::where('id','=',$section)->delete();
        session()->flash('delete','تمت عملية الحذف بنجاح');
        return redirect('/sections');
    }
}
