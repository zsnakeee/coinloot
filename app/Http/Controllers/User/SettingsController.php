<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index()
    {
        return view('user.settings');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('app-assets/images/portrait/small/'), $imageName);

            $user->avatar = $imageName;
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->save();
        } else {
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->save();
        }

        return redirect()->route('user.settings')->with('success', 'Your profile has been updated!');
    }


}
