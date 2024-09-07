<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $withdrawals = Withdrawal::where('user_id', $id)->get();
        return view('user.transactions', compact('withdrawals'));
    }
}
