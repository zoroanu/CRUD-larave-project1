<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
     
        $category = Category::all();
        // dd($product);
        return view('categories.index', compact('category'));
    }


    public function create()
    {
         return view('categories.create');
    }
    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        if($request->hasfile('image')) 
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/categories/',$filename);
            $category->image = $filename;
        }
        $category->save(); 
        return redirect()->back()->with('status','category Added Successfully');
    }


    public function edit($id)
     {
        $category = Category::find($id);
        return view(' categories.edit', compact('category'));
    
    }


    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->description = $request->input('description');
       

        if($request->hasfile('image')) 
        {
            $destination = 'uploads/categories/'.$category->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/categories/',$filename);
            $category->image = $filename;
        }
        
        $category->update(); 
        return redirect()->back()->with('status','Category Updated Successfully');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $destination = 'uploads/categories/'.$category->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $category->delete();
        return redirect()->back()->with('status','Category Deleted Successfully');
    
 }
}
