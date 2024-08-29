<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        return view('admin.categories.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('categories.index')->with('success', 'Danh mục đã được tạo thành công');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all(); // Để cho phép chọn parent_id
        return view('admin.categories.edit', compact('category', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);
    
        return redirect()->route('categories.index')->with('success', 'Danh mục đã được cập nhật thành công');
    }
    

    /**
     * Display the specified resource.
     */
    public function destroy( $id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete();

        return redirect()->route('categories.index')->with('success', 'Danh mục đã bị xóa');
    }

    /**
     * Show the form for editing the specified resource.
     */
 
    /**
     * Update the specified resource in storage.
     */
  
    /**
     * Remove the specified resource from storage.
     */

}
