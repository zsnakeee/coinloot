<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bonus;
use App\Models\BonusHistory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('user.home');
    }

    public function redeem(Request $request)
    {
        $code = $request->code;
        $bonus = Bonus::where('code', $code)->first();

        if (!$bonus)
            return redirect()->back()->with('error', 'Invalid bonus code');

        if (!$bonus->is_active)
            return redirect()->back()->with('error', 'Bonus code is not active');

        if ($this->IsBonusRedeemed($bonus->id))
            return redirect()->back()->with('error', 'You have already redeemed this bonus');

        $user = auth()->user();
        $user->addPoints($bonus->points);
        $user->bonusHistory()->create([
            'bonus_id' => $bonus->id,
        ]);

        return redirect()->back()->with('success', 'Bonus redeemed successfully');
    }

    public function IsBonusRedeemed($id): bool
    {
        $history = BonusHistory::where('user_id', auth()->user()->id)->where('bonus_id', $id)->first();
        if ($history)
            return true;

        return false;
    }
}
