<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Offerwall;
use Illuminate\Http\Request;

class EarnController extends Controller
{
    public function index()
    {
        $offerwalls = Offerwall::where('is_active', true)->get();
        return view('user.earn', compact('offerwalls'));
    }
}
