<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CPXResearchController extends Controller
{
    //https://coin-loot.com/api/cpxresearch?user_id={user_id}&campaign_id={offer_ID}&amount={amount_local}&ip={ip_click}&payout={amount_usd}
    public function callback(Request $request)
    {
        try {
            $data = $request->all();
            $data['company'] = "CPXResearch";
            $data['offer_name'] = "cpx-research";
            $this->increaseUserPoints($data);
            $this->saveLead($data);

        } catch (\Exception $e) {
            return response('NOT OK - Postback Failed', 400);
        }

        return response('OK - Postback Success', 200);
    }
}
