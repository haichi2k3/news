<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        
        
        $xx = Blog::all();
       
        // dd($getBlogListComment);
        // co dc 1 arr: 

        // frontend: reactjs
        // return view("xxx", compact('getBlogListComment'))

        // ajax
        return response()->json([
            'blog' => $xx
        ]);
        
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
    public function show($id)
    {

        if(!empty($id)) {

            // $getBlogDetail = Blog::with('comment')->find($id)->orderBy('comment.id', 'desc');

            $getBlogDetail = Blog::all()->find($id);

            return response()->json([
                'status' => 200,
                'data' => $getBlogDetail
            ]);
        }
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
