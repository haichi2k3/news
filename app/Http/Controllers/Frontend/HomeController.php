<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $latestPosts = Blog::orderBy('created_at', 'desc')->take(3)->get();  
        $oldestPosts = Blog::orderBy('created_at', 'asc')->take(5)->get();  
        $weekedPosts = Blog::orderBy('created_at', 'asc')->take(5)->get();  
        $category = Category::orderBy('created_at', 'desc')->take(4)->get();  
        return view('frontend.home.home', compact('latestPosts', 'oldestPosts', 'category', 'weekedPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
