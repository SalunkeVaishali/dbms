<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\TestMail;

class UserController extends Controller
{
    public function index()
    {
       
        $users = User::orderBy('id','desc')->get();
        return view('users.index', compact('users'));
         
    }

    public function sendMail($email,$password)
    {
        $data = [
            'name' => $email,
            'message' => $password,
            'view'=>'emails.test'
        ];
        return Mail::to($email)->send(new TestMail($data)); 
    }

    public function create()
    {
        //$roles = Role::all();
        $roles = Role::where('role_name', '!=', 'super')->get();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);
        $password=$request->password;
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
            'role_id' => $request->role_id,

        ]);
        $this->sendMail($request->email,$password);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        $roles = Role::where('role_name', '<>', 'super')->get();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->update($request->only(['first_name', 'last_name', 'email', 'role_id']));
        $this->sendUpdatedMail($user);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function sendUpdatedMail($user)
    {
        $data = [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'role_name'=>$user->role->role_name,
            'view'=>'emails.updateUser'
        ];
        return Mail::to($user->email)->send(new TestMail($data)); 
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
   
    }

