<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class BlogAdminController extends Controller
{
    public function index()
    {
        $posts = Blog::with('category', 'user', 'comments', 'rates')->get();
        return view('admin.blog.blog', compact('posts'));
    }

    public function statistic()
    {
        $posts = Blog::with('category', 'user')->get();
        return view('admin.blog.blog-statistic', compact('posts'));
    }

    public function destroy($id)
    {
        
        $post = Blog::findOrFail($id);
        $post->delete();

        return redirect()->route('blog.index')->with('success', 'Bài viết đã bị xóa');
    }

    public function approve($id)
    {
        $post = Blog::findOrFail($id);
        $post->is_approved = 1; // Đánh dấu bài viết là đã duyệt
        $post->save();

        return redirect()->back()->with('success', 'Bài viết đã được duyệt.');
    }

    public function author()
    {
        $authors = User::select('users.id', 'users.name')
            ->leftJoin('blog', 'users.id', '=', 'blog.user_id')
            ->selectRaw('COUNT(blog.id) as total_posts')
            ->selectRaw('SUM(blog.views) as total_views')
            ->selectRaw('SUM((SELECT COUNT(*) FROM comments WHERE comments.id_blog = blog.id)) as total_comments')
            ->selectRaw('SUM(CASE WHEN blog.is_approved = 1 THEN 1 ELSE 0 END) as approved_posts')
            ->groupBy('users.id', 'users.name')
            ->get();
    
        return view('admin.blog.blog-author', compact('authors'));
    }
    
}
