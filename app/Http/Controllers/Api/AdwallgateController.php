<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdwallgateController extends Controller
{
    //https://coin-loot.com/api/adwallgate?user_id={subId}&amount={reward}&ip={userIp}&payout={payout}
    public function callback(Request $request)
    {
        try {
            $data = $request->all();
            $data['company'] = "Adwallgate";
            $this->increaseUserPoints($data);
            $this->saveLead($data);
        } catch (\Exception $e) {
            return response('NOT OK - Postback Failed', 400);
        }

        return response('OK - Postback Success', 200);
    }
}
