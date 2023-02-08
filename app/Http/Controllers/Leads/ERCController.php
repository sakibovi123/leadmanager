<?php

namespace App\Http\Controllers\Leads;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ERCController extends Controller
{
    // ERC api
    public function send_data_to_erc(Request $request)
    {
        $lp_id = $request->get("1154");
        $fName = $request->get("FNAME");
        $lName = $request->get("LNAME");
        $email = $request->get("EMAIL");
        $home_phone = $request->get("HOME_PHONE");
        $business_name = $request->get("BUSINESS_NAME");
        $d_id = $request->get("DISTRIBUTIONID");

        if ( strlen($home_phone) <= 11 )
        {
            $body = [
                "LEAD_PROVIDER_ID" => $lp_id,
                "FNAME" => $fName,
                "LNAME" => $lName,
                "EMAIL" => $email,
                "HOME_PHONE" => $home_phone,
                "BUSINESS_NAME" => $business_name,
                "DISTRIBUTIONID" => $d_id
            ];

            $response = Http::asForm()
                ->post(
                    "https://jmtax.irslogics.com/postLead.aspx", $body);

            return $response->status();
        }


    }
}
