<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersViewController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        return view('admin.users-view', compact('user'));
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        switch ($request->input('action')) {
            case 'save':
                return $this->save($user, $request);
            case 'ban':
                return $this->ban($user);
        }
    }

    public function save($user, $request)
    {
        $user->current_points = $request->points;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->back()->with('success', 'Info has been updated');
    }

    public function ban($user)
    {
        if ($user->is_banned) {
            $user->is_banned = 0;
            $user->save();
            return redirect()->back()->with('success', 'User has been unbanned');
        } else {
            $user->is_banned = 1;
            $user->save();
            return redirect()->back()->with('success', 'User has been banned');
        }
    }
}
