<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BitswallController extends Controller
{
    //https://coin-loot.com/api/bitswall?user_id=[SB1]&campaign_id=[OID]&campaign_name=[ONM]&amount=[CUR]&ip=[IP]&payout=[PAY]
    public function callback(Request $request)
    {
        try {
            $data = $request->all();
            $data['company'] = "Bitswall";
            $this->increaseUserPoints($data);
            $this->saveLead($data);
        } catch (\Exception $e) {
            return response('NOT OK - Postback Failed', 400);
        }

        return response('OK - Postback Success', 200);
    }

}
