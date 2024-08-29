<?php

use App\Http\Controllers\Admin\BlogAdminController;
use App\Http\Controllers\Admin\DashboarcController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\MemberController;
use App\Http\Controllers\Frontend\NewsController;
use Illuminate\Support\Facades\Route;

// admin 
Route::get('/register-admin', [UserController::class, 'register'])->name('register2');
Route::post('/register-admin', [UserController::class, 'PostRegister'])->name(('post.register2'));
Route::get('/login-admin', [UserController::class, 'login'])->name('login2');
Route::post('/login-admin', [UserController::class, 'PostLogin'])->name('post.login2');
Route::get('/logout-admin', [UserController::class, 'logout'])->name('admin.logout');

Route::middleware(['admin'])->group(function() {
    Route::get('/dashboard', [DashboarcController::class, 'index'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'index'])->name('profile');
    Route::post('/profile/update', [UserController::class, 'update'])->name('admin.update');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::patch('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');


    Route::get('/blog-admin', [BlogAdminController::class, 'index'])->name('blog.index');
    Route::get('/blog-admin/statistic', [BlogAdminController::class, 'statistic'])->name('blog.statistic');
    Route::delete('/blog-admin/{id}', [BlogAdminController::class, 'destroy'])->name('blog.destroy');
    Route::patch('blog/{id}/approve', [BlogAdminController::class, 'approve'])->name('blog.approve');
    // Route::patch('blog/{id}/reject', [BlogAdminController::class, 'reject'])->name('blog.reject');
    Route::get('/blog-admin/author', [BlogAdminController::class, 'author'])->name('blog.author');


}); 

// user
Route::get('/register', [MemberController::class, 'register'])->name('register');
Route::post('/register', [MemberController::class, 'PostRegister'])->name('post.register');
Route::get('/login', [MemberController::class, 'login'])->name('login');
Route::post('/login', [MemberController::class, 'Postlogin'])->name('post.login');
Route::get('/forgot-password', function() {
    return view('frontend.user.forgot-pw');
});
Route::get('/logout', [MemberController::class, 'logout'])->name('logout');  


Route::get('/index', [HomeController::class, 'index'])->name('index');
// Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/news', [NewsController::class, 'index'])->name('news');
route::get('/contact', function() {
    return view('frontend.contact.contact');
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{id}', [BlogController::class, 'blogDetails'])->name('blog.details');
Route::get('/add-blog', [BlogController::class, 'addPost'])->name('blog.news');
Route::post('/add-blog', [BlogController::class, 'create'])->name('blog.create');
Route::get('/edit-blog/{id}', [BlogController::class, 'editPost'])->name('blog.edit');
Route::post('/edit-blog/{id}', [BlogController::class, 'update'])->name('blog.update');
Route::get('/author-stats', [BlogController::class, 'authorStats'])->name('author.stats');

Route::post('/blog/rate', [BlogController::class, 'rate'])->name('blog.rate');
Route::post('blog/comment', [BlogController::class, 'comment'])->name('blog.comment');  

Route::get('/account', [MemberController::class, 'account'])->name('account');  
Route::put('/account/update', [MemberController::class, 'update'])->name('account.update');  





Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');
