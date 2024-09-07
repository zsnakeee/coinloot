<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BonusHistory;
use Illuminate\Http\Request;

class BonusHistoryController extends Controller
{
    public function index()
    {
        $bonus_histories = BonusHistory::paginate(15);
        return view('admin.bonus-history', compact('bonus_histories'));
    }
}
