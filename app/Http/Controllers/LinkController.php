<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use Auth;
use DB;


class LinkController extends Controller
{   
    public function design(){
        return view('design');
    }
    public function showLinks()
    {
        $userId = Auth::user()->id;
        
        $data['links'] = Link::select('id','title', 'link', 'click_number')->where('user_id', $userId)->orderBy('created_at', 'desc')->paginate(10); 
        return view('links/link', $data);
    }

    
    public function create()
    {
        return view('links/add-link');
    }

    public function addLink(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'link' => 'required|url'
        ]);

        $link = Auth::user()->links()
            ->create($request->only(['title', 'link']));

        if ($link) {
            return redirect()->to('/links/link');
        }

        return redirect()->back();
    }

    public function edit(Link $link)
    {
        $user_id = $link->user_id ;   
        if ($user_id == Auth::id()) {
            return view('links/edit', [
                'link' => $link
            ]); 
        }
        
        return abort(404);
        
    }

    public function update(Link $link, Request $request)
    {
        if ($link->user_id !== Auth::id()) {
            return abort(403);
        }

        $request->validate([
            'title' => 'required|max:255',
            'link' => 'required|url'
        ]);

        $link->update($request->only(['title', 'link']));

        return redirect()->to('/links/link');
    }
    public function clickNumber(Request $request)
    {
        $link = $request->link;
        $linkId = $request->id;

        if(empty($link && $linkId))
        {
            return abort(404);
        }

        Link::where('id', $linkId)->increment('click_number', 1);

        return redirect()->away($link);
    }

    public function deleteLink(Link $link)
    {
        $linkId = $link->id;

        Link::where('id', $linkId)->delete();

        return redirect()->to('/links/link/');
    }

}
