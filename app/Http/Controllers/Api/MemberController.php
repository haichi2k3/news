<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\api\LoginRequest;



class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(LoginRequest $request)
    {


        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'role' => 0
        ];
        $remember = false;
        if ($request->remember_me) {
            $remember = true;
        }
       

        if ($this->doLogin($login, $remember)) {

             $user = Auth::user(); 
            //  $token = $user->createToken('authToken')->plainTextToken;
            // $success['token'] =  $user->createToken('MyApp')->accessToken; 


            return response()->json([
                    'success' => 'success',
                    // 'token' => $token, 
                    'Auth' => Auth::user()
                ], 
                // $this->successStatus
            ); 

            // $token = Auth::attempt($login);
            // return response()->json([
            //     'response' => 'success',
            //     'result' => [
            //         'token' => $token,
            //     ],
            //     'Auth' => Auth::user()
            // ], JsonResponse::HTTP_OK);

        } else {
            return response()->json([
                    'response' => 'error',
                    'errors' => ['errors' => 'invalid email or password'],
                ]); 
                // $this->successStatus); 
            // return response()->json([
            //     'response' => 'error',
            //     'errors' => ['errors' => 'invalid email or password'],
            // ], JsonResponse::HTTP_OK);
        }
    }

     /**
     * Do login
     *
     * @param $attempt
     * @param $remember
     * @return bool
     */
    protected function doLogin($attempt, $remember)
    {
        
        if (Auth::attempt($attempt, $remember)) {
            return true;
        } else {
            return false;
        }
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
