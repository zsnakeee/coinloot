<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Profit;
use App\Models\User;
use Illuminate\Http\Request;

class CPALeadController extends Controller
{
    //https://coin-loot.com/api/cpalead?user_id={subid}&campaign_id={campaign_id}&campaign_name={campaign_name}&amount={virtual_currency}&ip={ip_address}&payout={payout}
    public function callback(Request $request)
    {
        try {
            $data = $request->all();
            $data['company'] = "CPAlead";

            $this->increaseUserPoints($data);
            $this->saveLead($data);
        } catch (\Exception $e) {
            return response('NOT OK - Postback Failed', 400);
        }

        return response('OK - Postback Success', 200);
    }
}
