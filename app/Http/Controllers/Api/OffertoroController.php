<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Profit;
use App\Models\User;
use Illuminate\Http\Request;

class OffertoroController extends Controller
{
    //https://coin-loot.com/api/offertoro?user_id={user_id}&campaign_id={oid}&campaign_name={o_name}&amount={amount}&ip={ip_address}&payout={payout}
    public function callback(Request $request)
    {
        try {
            $data = $request->all();
            $data['company'] = "Offertoro";

            $this->increaseUserPoints($data);
            $this->saveLead($data);
        } catch (\Exception $e) {
            return response('NOT OK - Postback Failed', 400);
        }

        return response('OK - Postback Success', 200);
    }
}
