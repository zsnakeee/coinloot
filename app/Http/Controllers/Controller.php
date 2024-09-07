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
            'user_id' => $data['user_id'],
            'offer_id' => $data['campaign_id'] ?? null,
            'offer_name' => $data['campaign_name'] ?? null,
            'points' => $data['amount'],
            'payout' => $data['payout'],
            'ip' => $data['ip'] ?? null,
        ]);
    }

    public function increaseUserPoints($data)
    {
        $user = User::Find($data['user_id']);
        $user->update([
            'current_points' => $user->current_points + $data['amount'],
            'today_points' => $user->today_points + $data['amount'],
            'total_points' => $user->total_points + $data['amount'],
        ]);
    }
}
