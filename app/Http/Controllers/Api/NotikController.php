<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotikController extends Controller
{
    //https://coin-loot.com/api/notik
    public function callback(Request $request)
    {
        try {
            $data = $request->all();
            $data['company'] = "Notik";
            $data['campaign_name'] = $data['offer_name'];
            $data['campaign_id'] = $data['offer_id'];
            $data['ip'] = $data['conversion_ip'];
            $this->increaseUserPoints($data);
            $this->saveLead($data);
        } catch (\Exception $e) {
            return response('NOT OK - Postback Failed', 400);
        }

        return response('OK - Postback Success', 200);
    }
}
