<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use Illuminate\Support\Facades\Auth;


use App\Models\User;
Use App\Models\Link;

class UserController extends Controller
{
    
    public function index(){
        $userId = Auth::user()->id;
        $user_name = Auth::user()->name;
        $links = Link::where('user_id', $userId)->select('link')->count();

        $clicks = Link::where('user_id', $userId)->sum('click_number');

        return view('/links/index', ['name' => $user_name,'links' => $links, 'clicks' => $clicks]);
    }
//show page link
    public function show(User $user)
    {
        $user->load('links');
        return view('users.show', [
            'user' => $user,
        ]);
    }
//Show littlelinke page for edit
    public function showPage()
    {
        $userId = Auth::user()->id;

        $data['pages'] = User::where('id', $userId)->select('page', 'description')->get();

        return view('/users/page', $data);
    }

    //Save littlelink page (name, description, logo)
    public function editPage(request $request)
    {
        $userId = Auth::user()->id;
        $page = Auth::user()->page;

        $profilePhoto = $request->file('image');
        $pageName = $request->pageName;
        $pageDescription = $request->pageDescription;
        
        User::where('id', $userId)->update(['page' => $pageName, 'description' => $pageDescription]);

        if(!empty($profilePhoto)){
        $profilePhoto->move(public_path('/img'), $page . ".png");
        }

        return back();
    }
    public function showProfile()
    {
        $userId = Auth::user()->id;

        $data['profile'] = User::select('name', 'email')->where('id', $userId)->get();

        return view('/users/profile', $data);
    }

    //Save user (name, email, password)
    public function editProfile(request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
        ]);

        $userId = Auth::user()->id;

        $name = $request->name;
        $email = $request->email;
        //$password = Hash::make($request->password);

        User::where('id', $userId)->update(['name' => $name, 'email' => $email ]);

        return back();
    }
}
