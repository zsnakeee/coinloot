<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    //https://coin-loot.com/api/revenue?user_id=$uid$&campaign_id=$campaign$&campaign_name=$name$&amount=$currency$&ip=$ip$&payout=$rate$
    public function callback(Request $request)
    {
        try {
            $data = $request->all();
            $data['company'] = "Revenue";

            $this->increaseUserPoints($data);
            $this->saveLead($data);

        } catch (\Exception $e) {
            return response('NOT OK - Postback Failed', 400);
        }

        return response('OK - Postback Success', 200);
    }
}
