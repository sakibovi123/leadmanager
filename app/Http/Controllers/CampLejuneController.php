<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CampLejuneController extends Controller
{

    function post(Request $request){
        // vars for checking the form to send post request to client or no

        $is_loved = $request->get("is_loved");
        $have_attorney = $request->get("have_attorney");

        $first_name = $request->get("first_name");
        $last_name = $request->get("last_name");
        $email = $request->get("email");
        $phone = $request->get("phone");
        $address = $request->get("address");
        $city = $request->get("city");
        $state = $request->get("state");
        $zip_code = $request->get("zip_code");
        $ip_address = $request->ip();

        // contact details
        $type_of_legal_problem = $request->get("type_of_legal_problem");


        $body = [
            "contact" => [
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $email,
                "phone" => $phone,
                "address" => $address,
                "city" => $city,
                "state" => $state,
                "zip_code" => $zip_code,
                "ip_address" => $ip_address
            ],
            "data" => [
                "type_of_legal_problem" => $type_of_legal_problem
            ]
        ];
        if( $is_loved == "yes" || $is_loved == "Yes" && $have_attorney == "no" || $have_attorney == "No" )
        {

            if( $type_of_legal_problem != "no injury" && $type_of_legal_problem != "No Injury" )
            {

                $response = Http::withHeaders(["Authorization" => "Token 9680475e0e29d5a379ce183635129c6871f28cbe"])
                    ->post("https://test-api.jangl.com/v2/legal/capture", $body);

                if( $response->getStatusCode() == 200 )
                {
                    return response()->json([
                        "Success" => "True",
                        "Status" => $response->getStatusCode(),
                        "DB_STATUS" => "Saved",
                        "body" => $body
                    ]);
                }
                else
                {
                    return response()->json([
                        "Success" => "False",
                        "Status" => $response->getStatusCode(),
                        "DB_STATUS" => "Failed"
                    ]);
                }
            }
            else
            {
                return response()->json([
                    "message" => "Sorry you are not eligible for this offer"
                ]);
            }

        }

        else{
            return response()->json([
                "message" => "Sorry you are not eligible for this offer"
            ]);
        }


        // echo $response->getStatusCode();
    }
}
