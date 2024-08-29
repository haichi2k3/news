<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.profile.profile');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register()
    {
        return view('admin.user.register');
        
    }

    public function PostRegister(Request $request)
    {
        $user = new User();
        $user->role = $request->input('role');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->route('login2');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function login()
    {
        return view('admin.user.login');    
        
    }

    /**
     * Display the specified resource.
     */
    public function PostLogin(Request $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $remember = false;

        if($request->remember_me) {
            $remember = true;
        }
        
        if(Auth::attempt($login, $remember)) {
            if(Auth::user()->role == 1){
                return redirect('/dashboard');
            } else {
                Auth::logout();
                return redirect()->route('login2')->withErrors(['login2' => 'Unauthorized role.']);
            }
        } else {
            return redirect()->back()->withErrors(['login2' => 'Sai Email hoặc Mật khẩu.']);
        }
                // dd($credentials);
                // dd(Auth::user());
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
    public function update(Request $request)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        $data = $request->all();
        $file = $request->avatar_path;

        if(empty($data['password'])) {
            $data['password'] = $user->password;
        } else {
            $data['password'] = bcrypt($user->password);
        }

        if(!empty($file)) {
            $data['avatar_path'] = $file->getClientOriginalName();
            $path = public_path('upload/admin/avatar');
            $file->move($path, $data['avatar_path']);
        }

        if($user->update($data)) {
            if(!empty($file)) {
                $user->avatar_path = $data['avatar_path'];
            }
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->save();
          return redirect()->back()->with('success', __('Cập nhật thông tin thành công.'));
        }
        return redirect()->back()->with('error', __('Có lỗi xảy ra.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/login-admin');
    }
}
