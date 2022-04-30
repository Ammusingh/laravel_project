<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Redirect;
use Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('user.register');
    }

    public function login()
    {
        return view('user.login');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|max:255',
            'email'       => 'required|unique:users',
            'password'    => 'required|min:8'
          ]);

        if($validator->passes())
        {
            $user = new User();

            $user->name  = $request->name;
            $user->email = $request->email;
            $user->role  = 3;
            $user->password = Hash::make($request->password);

            $user->save();
            Session::flash('success','User Created Successfully');
            return redirect('/login');
        }
    }
}
