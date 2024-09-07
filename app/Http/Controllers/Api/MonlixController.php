<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MonlixController extends Controller
{
    //https://coin-loot.com/api/monlix?user_id={{userId}}&campaign_id={{transactionId}}&campaign_name={{taskName}}&amount={{rewardValue}}&ip={{userIp}}&payout={{payout}}
    public function callback(Request $request)
    {
        try {
            $data = $request->all();
            $data['company'] = "Monlix";
            $data['payout'] = $data['amount'] ?? 0 / 1000;
            $this->increaseUserPoints($data);
            $this->saveLead($data);
        } catch (\Exception $e) {
            return response('NOT OK - Postback Failed', 400);
        }

        return response('OK - Postback Success', 200);
    }
}
