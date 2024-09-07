<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Profit;
use App\Models\User;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

class AdgemController extends Controller
{
    //https://coin-loot.com/api/adgem?user_id={player_id}&campaign_id={campaign_id}&campaign_name={campaign_name}&amount={amount}&ip={ip}&payout={payout}
    public function callback(Request $request)
    {
        try {
            $data = $request->all();
            $data['company'] = "Adgem";

            $this->increaseUserPoints($data);
            $this->saveLead($data);
        } catch (\Exception $e) {
            return response('NOT OK - Postback Failed', 400);
        }

        return response('OK - Postback Success', 200);
    }

}
