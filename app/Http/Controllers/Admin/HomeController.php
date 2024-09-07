<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\User;
use App\Models\Withdrawal;

class HomeController extends Controller
{
    public function index()
    {
        $profit = [
            'total' => Lead::sum('payout'),
            'today' => Lead::whereDate('created_at', today())->sum('payout'),
            'this_month' => Lead::whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->sum('payout'),
        ];

        $users = [
            'count' => User::all()->count(),
            'new' => User::where('created_at', '>=', date('Y-m-d', strtotime('-1 day')))->count(),
            'active' => User::where('last_login_ip', '>=', date('Y-m-d', strtotime('-1 day')))->count(),
            'banned' => User::where('is_admin')->count(),
        ];

        $withdrawals = [
            'count' => Withdrawal::all()->count(),
            'pending' => Withdrawal::where('status', 0)->count(),
            'paid' => Withdrawal::where('status', 1)->count(),
            'rejected' => Withdrawal::where('status', 2)->count(),
            'refunded' => Withdrawal::where('status', 3)->count(),
        ];

        return view('admin.home', compact('profit', 'users', 'withdrawals'));
    }
}
