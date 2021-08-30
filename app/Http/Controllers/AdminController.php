<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Auth;
use Exception;

use App\Models\User;
use App\Models\Admin;
use App\Models\Link;

class AdminController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $page = Auth::user()->page;
        $links = Link::where('user_id', $userId)->select('link')->count();
        $clicks = Link::where('user_id', $userId)->sum('click_number');
       
        $userNumber = User::count();
        $siteLinks = Link::count();
        $siteClicks = Link::sum('click_number');

        return view('admins/index', ['page' => $page, 'links' => $links, 'clicks' => $clicks, 'siteLinks' => $siteLinks, 'siteClicks' => $siteClicks, 'userNumber' => $userNumber]);
    }

    //Get users by type
    public function users(request $request)
    {
        $usersType = $request->type;

        switch($usersType){
            case 'all':
                $data['users'] = User::select('id', 'name', 'role', 'block')->get();
                return view('admins/users', $data);
                break;
            case 'user':
                $data['users'] = User::where('role', 'user')->select('id', 'name', 'role', 'block')->get();
                return view('admins/users', $data);
                break;
            case 'vip':
                $data['users'] = User::where('role', 'vip')->select('id', 'name', 'role', 'block')->get();
                return view('admins/users', $data);
                break;     
            case 'admin':
                $data['users'] = User::where('role', 'admin')->select('id', 'name', 'role', 'block')->get();
                return view('admins/users', $data);
                break;
            }
    }

    //Search user by name
    public function searchUser(request $request)
    {
        $name = $request->name;
        $data['users'] = User::where('name', $name)->select('id', 'name', 'role', 'block')->get();
        return view('admins/users', $data);
    }

    //Block user and delete their links
    public function blockUser(request $request)
    {
        $id = $request->id;
        $status = $request->block;

        if($status == 'yes'){
            $block = 'no';
        }elseif($status == 'no'){
            $block = 'yes';
        }

        User::where('id', $id)->update(['block' => $block]);

        Link::where('user_id', $id)->delete();

        return redirect('admins/users/all');
    }

    //Show user to edit
    public function showUser(request $request)
    {
        $id = $request->id;

        $data['user'] = User::where('id', $id)->get();
       
        return view('admins/edit-user', $data);

    }

    //Save user edit
    public function editUser(request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $password = Hash::make($request->password);
        $profilePhoto = $request->file('image');
        $page = $request->page;
        $description = $request->description;
        $role = $request->role;
        
        User::where('id', $id)->update(['name' => $name, 'email' => $email, 'password' => $password, 'page' => $page, 'description' => $description, 'role' => $role]);

        if(!empty($profilePhoto)){
        $profilePhoto->move(public_path('/img'), $page . ".png");
        }

        return back();
    }
}
