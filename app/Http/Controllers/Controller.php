<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function saveLead($data)
    {
        Lead::create([
            'company' => $data['company'],
            'user_id' => $data['user_id'],
            'offer_id' => $data['campaign_id'] ?? null,
            'offer_name' => $data['campaign_name'] ?? null,
            'points' => $data['amount'],
            'payout' => $data['payout'],
            'ip' => $data['ip'] ?? null,
            'country' => $data['country_code'] ?? null,
        ]);
    }

    public function increaseUserPoints($data)
    {
        $user = User::findOrFail($data['user_id']);
        $user->update([
            'current_points' => $user->current_points + floatval($data['amount']),
            'today_points' => $user->today_points + floatval($data['amount']),
            'total_points' => $user->total_points + floatval($data['amount']),
        ]);
    }
}
