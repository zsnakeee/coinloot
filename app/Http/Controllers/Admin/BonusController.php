<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bonus;
use Illuminate\Http\Request;

class BonusController extends Controller
{
    public function index()
    {
        $bonuses = Bonus::paginate(15);
        return view('admin.bonus', compact('bonuses'));
    }

    public function add(Request $request)
    {
        $request->validate(['code' => 'required|unique:bonuses']);
        Bonus::create([
            'code' => $request->code,
            'points' => $request->points,
            'max_uses' => $request->max,
        ]);

        return redirect()->route('admin.bonus')->with(['success' => 'Added Bonus Code Successfully']);
    }

    public function update(Request $request)
    {
        try {
            $bonus = Bonus::findOrFail($request->change);
            $bonus->is_active = !$bonus->is_active;
            $bonus->save();
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'Bonus Code Not Found']);
        }
        return redirect()->route('admin.bonus')->with(['success' => 'Updated Bonus Successfully']);
    }
}
