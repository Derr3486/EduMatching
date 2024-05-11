<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\feedback;
use App\Models\personality;
use App\Models\program;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Log;

class Users extends Controller
{

    public function test()
    {
        return view ('test');
    }
////////////Admin//////////////////////////////////////////////////////////////////////////////////////////////////
public function AdminHome()
{
    $feedbacks = feedback::all();
    return view('Admin.AdminHome',['feedbacks'=>$feedbacks]);
}

public function AdminManageUsers()
{
    $users = User::all();
    return view('Admin.AdminManageUsers',['users'=>$users]);
}

public function AdminStore(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['role'] = 'admin';

        $newUser = User::create($data);//saving it to DB

        if(!$newUser)
        {
            //redirect back to index page showing the error
            return redirect(route('user.index'))->with("error","Unable to register");
        }
        //redirect to register sucess page
        return redirect(route('user.registered')); 
    }

    public function AdminManagePrograms()
    {
        $programs = program::all();
        return view('Admin.AdminManagePrograms',['programs'=>$programs]);
    }

    public function AdminManagePersonalities()
    {
        $personalities = personality::all();
        return view('Admin.AdminManagePersonalities',['personalities'=>$personalities]);
    }

//////////Login-Register controller//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function index()
    {
        //accessing DB through model(User)
        //$users = User::all();
        //return the data
        return view('Index');
        //,['users'=>$users]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['role'] = 'user';

        $newUser = User::create($data);//saving it to DB

        if(!$newUser)
        {
            //redirect back to index page showing the error
            return redirect(route('user.index'))->with("error","Unable to register");
        }
        //redirect to register sucess page
        return redirect(route('user.registered')); 
    }

    public function registered()
    {
        return view('Registered');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        //Take only email and password
        $credentials = $request->only('email','password');
        //Authenticate
        if(Auth::attempt($credentials))
        {
            $user = Auth::user();

            if($user->role == 'user')
            {
                //direct to User page
                return redirect()->intended(route('user.loggedin'));
            }

            elseif($user->role == 'admin')
            {
                //direct to Admin page
                return redirect()->intended(route('AdminHome'));
            }
        }
        else
        {
            //else route to index page with error
            return redirect(route('user.fail'))->with("error","Invalid credentials!");
        }
    }

    public function loggedin()
    {
        return view('/Login');
    }

    public function fail()
    {
        return view('InvalidLogin');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('user.index'));
    }

///////////Draft code/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function edit(User $user)
    {
        return view('edit', ['user' =>$user]);
    }

    public function update(User $user, Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        $user->update($data);
        return redirect(route('user.index'))->with('success', 'Updated');
    }

    public function delete(User $user)
    {
        $user -> delete();
        return redirect(route('user.index'))->with('success', 'Deleted');
    }
}
