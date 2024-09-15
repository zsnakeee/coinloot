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
            'password' => ['string', 'min:8'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if ($request->password) {
            $user->password = bcrypt($request->password);
            $user->save();
        }

        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('app-assets/images/portrait/small/'), $imageName);

            $user->avatar = $imageName;
            $user->save();
        }

        return redirect()->route('user.settings')->with('success', 'Your profile has been updated!');
    }


}
