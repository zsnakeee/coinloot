<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MediumpathController extends Controller
{
    //https://coin-loot.com/api/mediumpath?pb_method=GET&user_id={user_id}&campaign_id={campaign_id}&campaign_name={campaign_name}&amount={reward}&ip={userIp}
    public function callback(Request $request)
    {
        try {
            $data = $request->all();
            $data['company'] = "Mediumpath";
            $data['payout'] = $data['amount'] ?? 0 / 1000;

            $this->increaseUserPoints($data);
            $this->saveLead($data);
        } catch (\Exception $e) {
            return response('NOT OK - Postback Failed', 400);
        }

        return response('OK - Postback Success', 200);
    }
}
