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
}
