<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;

class LiveLeadsController extends Controller
{
    public function index()
    {
        $leads = Lead::orderBy('created_at', 'desc')->get();
        return view('user.live-leads', compact('leads'));
    }
}
