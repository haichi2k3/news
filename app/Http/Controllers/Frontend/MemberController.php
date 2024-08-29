<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
         //
     }

    public function register()
    {
        return view('frontend.user.register');
        
    }

    public function PostRegister(Request $request)
    {
        $user = new User();
        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->route('login');
    }


    public function login()
    {
       return view('frontend.user.login');
    }

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
            return redirect('/index');
        } else {
            return redirect()->back()->withErrors(['login' => 'Sai Email hoặc Mật khẩu.']);

        }
    }

    public function account()
    {
        return view('frontend.account.account');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        $data = $request->all();
        $file = $request->avatar_path;

        if (empty($data['password'])) {
            $data['password'] = $user->password;
        } else {
            $data['password'] = bcrypt($data['password']); 
        }

        if(!empty($file)) {
            $data['avatar_path'] = $file->getClientOriginalName();
            $path = public_path('upload/frontend/user');
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
     * Display the specified resource.
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
