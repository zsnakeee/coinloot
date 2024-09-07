<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $leads = Lead::where('user_id', auth()->user()->id)->get();
        return view('user.history', compact('leads'));
    }
}
