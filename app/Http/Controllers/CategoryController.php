<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cotegory\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

use Session;

class CategoryController extends Controller
{
    public function addcategory()
    {
        return view('admin.category.category_add');
    }

    public function slug_generator($string)
    {
        $string = str_replace(' ', '-', $string);
        $string = preg_replace('/[^A-Za-z-0-9]/', '', $string);
        return strtolower(preg_replace('/-+/', '-', $string));
    }

    public function savecategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name|max:20',
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_slug = $this->slug_generator($request->category_name);
        $category->save();
        Session::Flash('msg', 'Category save successfully');
        return back();
    }


     public function managecategory()
     {
         $category = Category::orderBy('id', 'DESC')->get();
         return view('admin.category.manage_category', compact('category'));
     }
    public function inactive($id)
    {
        $category = Category::find($id);
        $category->status = 0;
        $category->save();
        return back();
    }
    public function active($id)
    {
        $category = Category::find($id);
        $category->status = 1;
        $category->save();
        return back();
    }
    public function categorystatus($id, $status)
    {
        $category = Category::find($id);
        $category->status = $status;
        $category->save();
        return response()->json(['message' => 'success']);
    }
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        Session::Flash('msg', 'Category delete successfully');
        return back();
    }

    public function edit($id)
    {
        $row = Category::find($id);
        return view('admin.category.category_edit', compact('row'));
    }


    public function updatecategory(Request $request)
    {

        $request->validate([
            'category_name' => 'required|unique:categories,category_name|max:20',

        ]);
        $category = Category::find($request->id);

        $category->category_name = $request->category_name;
        $category->category_slug = $this->slug_generator($request->category_name);
        $category->save();
        Session::Flash('msg', 'Category update successfully');
        return back();
    }
}
