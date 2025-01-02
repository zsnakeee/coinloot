<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MonlixController extends Controller
{
    // api/monlix?user_id={{userId}}&campaign_id={{campaignId}}&campaign_name={{taskName}}&amount={{rewardValue}}&ip={{userIp}}&payout={{payout}}&country_code={{countryCode}}
    public function callback(Request $request)
    {
        try {
            $data = $request->all();
            $data['company'] = "Monlix";

            $this->increaseUserPoints($data);
            $this->saveLead($data);
        } catch (\Exception $e) {
            return response('NOT OK', 400);
        }

        return response('OK', 200);
    }
}
