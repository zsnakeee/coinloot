<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        $winners = User::where('is_admin', false)
            ->orderBy('total_points', 'desc')
            ->paginate(10);

        return view('user.leaderboard', compact('winners'));
    }
}
