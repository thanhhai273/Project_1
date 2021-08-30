<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class changePasswordController extends Controller
{
    public function index()
    {

      return view('auth.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
          'current_password' => 'required',
          'password' => 'required|string|min:6|confirmed',
          'password_confirmation' => 'required',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Mật khẩu nhập lại không chính xác!');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('login')->with('success', 'Đổi mật khẩu thành công!');
    }
}
