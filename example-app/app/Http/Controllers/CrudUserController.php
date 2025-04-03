<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CrudUserController extends Controller
{
     /**
     * Login page
     */
    public function login()
    {
        return view('crud_user.login');
    }

    /**
     * User submit form login
     */
    public function authUser(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
         
            return redirect()->intended('list')->withSuccess('Signed in');
        }
    
    }
    

    /**
     * Registration page
     */
    public function createUser()
    {
        return view('crud_user.create');
    }

    /**
     * User submit form register
     */
    public function postUser(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate the image

        ]);
       
        $imagePath = $request->file('image')->store('avatars', 'public');

        $user = User::create([
            'username' => $request->username,
            'like' => $request->like,
            'facebook' => $request->facebook,
            'image' => $request->image,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect("login")->withSuccess('Tạo tài khoản thành công! Vui lòng đăng nhập.');
    }

    /**
     * View user detail page
     */
    public function readUser(Request $request) {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('crud_user.read', ['messi' => $user]);
    }

    /**
     * Delete user by id
     */
    public function deleteUser(Request $request) {
        $user_id = $request->get('id');
        $user = User::destroy($user_id);

        return redirect("list")->withSuccess('You have signed-in');
    }

    /**
     * Form update user page
     */
    public function updateUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('crud_user.update', ['user' => $user]);
    }

    /**
     * Submit form update user
     */
    public function postUpdateUser(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,id,'.$input['id'],
            'password' => 'required|min:6|confirmed',
        ]);

       $user = User::find($input['id']);
       $user->username = $request->username;
       $user->like = $request->like;
       $user->facebook = $request->facebook;
       $user->image = $request->image;
       $user->email = $request->email;
       
       if (!empty($request->password)) {
           $user->password = Hash::make($request->password);
       }
   
       $user->save();

        return redirect("list")->withSuccess('You have signed-in');
    }

    /**
     * List of users
     */
    public function listUser()
    {
        if(Auth::check()){
            $users = User::all();
            return view('crud_user.list', ['users' => $users]);
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Sign out
     */
    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}