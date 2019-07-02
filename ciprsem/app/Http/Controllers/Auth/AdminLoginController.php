<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;



class AdminLoginController extends Controller
{
    //



    public function __construct()
    {
        $this->middleware('guest:admin',['except'=>['logout','relogin']]);
    }

    public function showLoginForm()
    {
        return view('admin.login.login');
    }

    public function login(Request $request)
    {

        //Validate data comming from FORM :D

        $validator = Validator::make(Input::all(),
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);
        if ($validator->fails()) {

            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=> $request->password,'active'=>false]))
        {
            $this->logout();
            return response()->json(['errors'=>['active'=>trans('admin.logins.login_not_active')]]);

        }
        elseif (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password,'active'=>true]))
        {
            // return redirect()->intended(route('admin.home'));

            return response()->json(['success'=>trans('auth.good')]);

        }
        //return $this->sendFailedLoginResponse($request);

        return response()->json(['errors'=>['failed'=>trans('auth.failed')]]);
    }
    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }
    public function relogin()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }


}
