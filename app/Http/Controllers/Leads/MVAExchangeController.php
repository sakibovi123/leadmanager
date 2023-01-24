<?php

namespace App\Http\Controllers\Leads;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MVAExchangeController extends Controller
{
    // mva exchange legal justice controller function


    public function send_data(Request $request)
    {

        $first_name = $request->get("first_name");
        $last_name = $request->get("last_name");
        $phone = $request->get("phone");
        $email = $request->get("email");
        $city = $request->get("city");
        $state = $request->get("state");
        $zip_code = $request->get("zip_code");
        $incident_date = $request->get("incident_date");
        $physical_injury = $request->get("physical_injury");
        $currently_represented = $request->get("currently_represented");
        $at_fault = $request->get("at_fault");
        $case_description = $request->get("case_description");
        $ip_address = $request->ip();
        $user_agent = $request->header("user-agent");
        $landing_page = $request->get("landing_page");


            $response = Http::post("https://hooks.zapier.com/hooks/catch/13844305/bv1lo3y/", [
                "first_name" => $first_name,
                "last_name" => $last_name,
                "phone" => $phone,
                "email" => $email,
                "city" =>$city,
                "state" => $state,
                "zip_code" => $zip_code,
                "incident_date" => $incident_date,
                "physical_injury" => $physical_injury,
                "currently_represented" => $currently_represented,
                "at_fault" => $at_fault,
                "case_description" => $case_description,
                "ip_address" => $ip_address,
                "user_agent" => $user_agent,
                "landing_page" => $landing_page
            ]);

            if( $response->getStatusCode() == 200 )
            {
                return response()
                    ->json([
                        "status" => "ACCEPTED",
                        "body" => $response
                    ]);
            }
            else
            {
                return response()
                    ->json([
                        "status" => "ERROR",

                    ]);
            }



    }

}
