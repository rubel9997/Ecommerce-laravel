<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class BrandController extends Controller
{
public function addbrand()
{
    return view('admin.brand_add');
}
public function savebrand(Request $request)
{
    // return $request;
    // return $request->all();
    //Eloquent ORM
    $request->validate([
        'brand_name'=>'required|unique:brands,brand_name|max:20',

    ]);
    $brand= New Brand();
    $brand->brand_name=$request->brand_name;
    $brand->brand_slug=$this->slug_generator($request->brand_name );
    $brand->save();
    Session::Flash('msg','Brand save successfully');
    return back();
    //return "success";
    // return back();
    // return redirect('brand/add-brand');
    // return redirect()->back();
    // Brand::create($request->all());
    // return "success";
    // Query Builder
    // DB::table('brands')->insert([
    //     'brand_name'=>$request->brand_name
    // ]);
    // return "success";
}
public function slug_generator($string)
{
    $string=str_replace(' ','-',$string);
    $string=preg_replace('/[^A-Za-z-0-9]/','',$string);
    return strtolower(preg_replace('/-+/','-',$string));
}


public function managebrand()
{
    // return Brand::all();
    // return Brand::where('id',9)->get();
    // return Brand::where('id',9)->first();
    $brand= Brand::orderBy('id','DESC')->get();
        return view('admin.brand_list',compact('brand'));
}
public function inactive($id)
{
    $brand= Brand::find($id);
    $brand->status=0;
    $brand->save();
    return back();
}
public function active($id)
{
    $brand= Brand::find($id);
    $brand->status=1;
    $brand->save();
    return back();
}
public function brandstatus($id,$status)
{
    $brand= Brand::find($id);
    $brand->status=$status;
    $brand->save();
    return response()->json(['message'=>'success']);
}
public function delete($id)
{
    $brand= Brand::find($id);
    $brand->delete();
    $brand->save();
    Session::Flash('msg','Brand delete successfully');
    return back();
}
public function edit($id)
{
    $row= Brand::find($id);
    return view('admin.brand_edit',compact('row'));
}
public function updatebrand(Request $request)
{

    $request->validate([
        'brand_name'=>'required|unique:brands,brand_name|max:20',

    ]);
    $brand= Brand::find($request->id);

    $brand->brand_name=$request->brand_name;
    $brand->brand_slug=$this->slug_generator($request->brand_name );
    $brand->save();
    Session::Flash('msg','Brand update successfully');
    return back();
}



public function profile(Request $request)
{
    return view('admin.profile');
}


}
