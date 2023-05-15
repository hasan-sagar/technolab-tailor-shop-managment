<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
    //
    public function ViewCategory()
    {
        $category = Category::latest()->get();
        return view('category.view_category',compact('category'));
    }

    public function StoreCategory(Request $request)
    {
        $validateData =$request->validate([
            'name'=>'required|max:200'
        ]);

        Category::insert([
            'name'=>$request->name,
            'created_at'=>Carbon::now(),
        ]);

        $notification = array(
            'message'=> 'Category Added Successfully',
            'alert-type'=>'success'
        );

        return  redirect()->back()->with($notification);
    }

    public function EditCategory($id)
    {
        $category =  Category::findOrFail($id);
        return view('category.edit_category',compact('category'));
    }

    public function UpdateCategory(Request $request)
    {
        $customerId = $request->id;
        Category::findOrFail($customerId)->update([
            'name'=>$request->name,
            'updated_at'=>Carbon::now(),
        ]);

        $notification = array(
            'message'=> 'Category Updated',
            'alert-type'=>'success'
        );

        return redirect()->route('view.category')->with($notification);
    }

    public function DeleteCategory($id)
    {
        Category::findOrFail($id)->delete();
        $notification = array(
            'message'=> 'Category Deleted',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
