<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Session;
class SubcategoryController extends Controller
{
    //
    
    public function managesubcategory()
    {
        $category = Subcategory::with('Category')->get();
    
        return view('admin.category.manage_subcategory', compact('category'));
    }

    public function addsubcategory()
    {
        $category = Category::where('status',1)->orderBy('category_name', 'ASC')->get();
        return view('admin.category.add_sub_category',compact('category'));
    }

    
    public function savecategory(Request $request)
    {

        
        $request->validate([
            'sub_cat' => 'required|unique:subcategories,sub_cat|max:20',
        ]);

        $category = new Subcategory();
        $category->cat_id = $request->cat_id;
        $category->sub_cat = $request->sub_cat;
        $category->save();
        Session::Flash('msg', 'Category save successfully');
        return back();
    }

    
}
  