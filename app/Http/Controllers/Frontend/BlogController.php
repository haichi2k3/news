<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Blog::paginate(4);
        $category = Category::all();
        $latestPosts = Blog::orderBy('created_at', 'desc')->take(4)->get();  
        return view('frontend.blog.blog', compact('posts', 'category', 'latestPosts'));
    }

    public function blogDetails($id)
    {
        $post = Blog::with('category', 'user')->findOrFail($id);
        $category = Category::all();


        $post->increment('views');
        $comments = Comment::where('id_blog', $id)->get();
        $avgRate = Rate::where('id_blog', $id)->avg('rate');

        $latestPosts = Blog::orderBy('created_at', 'desc')->take(4)->get();  


        $previousPost = Blog::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
        $nextPost = Blog::where('id', '>', $post->id)->orderBy('id', 'asc')->first();

        return view('frontend.blog.blog-details', compact('post', 'previousPost', 'nextPost', 'comments', 'avgRate', 'category', 'latestPosts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function addPost()
    {
        $categories = Category::all();
        return view('frontend.blog.blog-add', compact('categories'));
    }

    public function create(Request $request)
    {
        $post = new Blog();
        $post->user_id = Auth::id();
        
        if($request->hasFile('image_path')) {
            $file = $request->file('image_path');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = public_path('upload/frontend/blog');
            $file->move($path, $fileName);
            $post->image_path = $fileName;
        }

        $post->title = $request->input('title'); 
        $post->description = $request->input('description');
        $post->content = $request->input('content');
        $post->category_id = $request->input('category_id');
        $post->save();

        return redirect()->back()->with('success', __('Tạo bài viết thành công.'));
    }

    public function editPost($id)
    {
        $post = Blog::findOrFail($id);
        $categories = Category::all();
        return view('frontend.blog.blog-edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
{
    $post = Blog::findOrFail($id);
    
    if($request->hasFile('image_path')) {
        $file = $request->file('image_path');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $path = public_path('upload/frontend/blog');
        $file->move($path, $fileName);
        $post->image_path = $fileName;
    }

    $post->title = $request->input('title');
    $post->description = $request->input('description');
    $post->content = $request->input('content');
    $post->category_id = $request->input('category_id');
    $post->save();

    return redirect()->route('author.stats')->with('success', 'Bài viết đã được cập nhật thành công.');
}


    /**
     * Store a newly created resource in storage.
     */
    public function rate(Request $request)
    {
        $userId = Auth::id();

        $exist = Rate::where('id_blog', $request->id_blog)
                    ->where('id_user', $userId)
                    ->first();

        if($exist) {
            $exist->rate = $request->ratingVal;
            $exist->save();
        } else {
            Rate::create([
                'id_user' => $userId,
                'id_blog' => $request->id_blog,
                'rate' => $request->ratingVal,
            ]);


        }
       
        return response()->json(['message' => 'Rating saved successfully'], 200);

    }
    
    /**
     * Display the specified resource.
     */

    //  public function commentIndex( $id_blog)
    // {
    //     $comments = Comment::where('id_blog', $id_blog)->get();
    //     return view('')
    // }


    public function comment(Request $request)
    {
        $id_user = Auth::id();
        $name = Auth::user()->name;
        $avatar_path = Auth::user()->avatar_path;
        Comment::create([
            'comment' => $request->comment,
            'id_blog' => $request->id_blog,
            'id_user' => $id_user,
            'avatar_path' => $avatar_path ?? 'comment_1.png',
            'name' => $name,
            'level' =>  $request->parent_id ?? 0,
        ]);

        return back()->with('success', 'Thêm bình luận thành công.');
    }

    /**
     * Show the form for editing the specified resource.
     */

     public function authorStats()
    {
        $posts = Blog::all();
        $userId = Auth::id();
        $approvedPosts = Blog::where('user_id', $userId)->where('is_approved', 1)->get();
        $pendingPosts = Blog::where('user_id', $userId)->where('is_approved', 0)->get();
        $rejectedPosts = Blog::where('user_id', $userId)->where('is_approved', 2)->get();

        return view('frontend.blog.author-stats', compact('approvedPosts', 'pendingPosts', 'rejectedPosts', 'posts'));
    }

    /**
     * Update the specified resource in storage.
     */
 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Blog::findOrFail($id);
        $post->delete();

        return redirect()->route('author.stats')->with('success', 'Bài viết đã bị xóa.');
    }


 
}
