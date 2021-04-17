<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubsubcategoryController extends Controller
{
    //
    public function managesubsubcategory()
    {
        return view('admin.category.manage_subsubcategory');
    }
}
