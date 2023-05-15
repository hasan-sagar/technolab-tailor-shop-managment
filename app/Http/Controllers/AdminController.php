<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function ViewAdminProfile()
    {
        $id = Auth::user()->id;
        $adminData = User::findOrFail($id);
        return view('admin.admin_profile', compact('adminData'));
    }

    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::findOrFail($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        $notification = [
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->back()
            ->with($notification);
    }

    public function AdminPasswordChangeView()
    {
        return view('admin.admin_change_password');
    }

    public function UpdateAdminPassword(Request $request)
    {
        /// Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        /// Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            $notification = [
                'message' => 'Old Password Dones not Match!!',
                'alert-type' => 'error',
            ];
            return back()->with($notification);
        }

        //// Update The New Password

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        $notification = [
            'message' => 'Password Change Successfully',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }
}
