<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all()->skip(1);
        return view('backend.user.index', compact('users'));
    }

    public function reset($id)
    {
        $user = User::find($id);
        $user->password = bcrypt(123456);
        $user->save();
        session()->flash('message', 'Password user ' . $user->name . ' telah direset.');
        return redirect()->route('dashboard.user');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        session()->flash('message', 'User telah dihapus.');
        return redirect()->route('dashboard.user');
    }

    public function change_password()
    {
        return view('backend.user.change-password');
    }

    public function update_password(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:new_password',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $validator->setAttributeNames([
            'new_password' => 'New Password',
            'confirm_password' => 'Confirmation Password',
        ]);

        $user = \Auth::user();

        $user->update([
            'password' => \Hash::make($request->new_password),
        ]);

        return response()->json(['success' => 'Password berhasil diubah.']);
    }
}
