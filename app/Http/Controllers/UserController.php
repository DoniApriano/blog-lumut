<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('user.user', compact(['users']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username'     => 'required',
            'password'   => 'required',
            'name'   => 'required'
        ]);

        User::create([
            'username'     => $request->username,
            'password'     => $request->password,
            'role'         => 'author',
            'name'         => $request->name,
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'username'     => 'required',
            'name'   => 'required'
        ]);

        $user = User::findOrFail($id);
        if ($request->password) {
            $user->update([
                'username'     => $request->username,
                'password'     => $request->password,
                'role'         => 'author',
                'name'     => $request->name,
            ]);
        } else {
            $user->update([
                'username'     => $request->username,
                'role'         => 'author',
                'name'     => $request->name,
            ]);
        }


        return redirect()->back();
    }
}
