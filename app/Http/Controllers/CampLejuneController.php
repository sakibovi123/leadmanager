<?php

namespace App\Http\Controllers;

use App\Models\CampLejeune;
use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\DNSCheckValidation;
use Egulias\EmailValidator\Validation\EmailValidation;
use Egulias\EmailValidator\Validation\MultipleValidationWithAnd;
use Egulias\EmailValidator\Validation\RFCValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CampLejuneController extends Controller
{

    public function index()
    {
        $camps = CampLejeune::all();
        return view("Camp.camps", [
            "camps" => $camps
        ]);
    }


    public function post(Request $request){
        // vars for checking the form to send post request to client or no

        $email_validate = new EmailValidator();
        $multi_validation_checker = new MultipleValidationWithAnd([
            new RFCValidation(),
            new DNSCheckValidation()
        ]);
        $validated = $request->validate([
            "email"=> 'email:rfc'
        ]);

        $camp = new CampLejeune();

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

        if( $email_validate->isValid($email, $multi_validation_checker) )
        {

            if( $is_loved == "yes" || $is_loved == "Yes" && $have_attorney == "no" || $have_attorney == "No" )
            {

                if( $type_of_legal_problem != "no injury" && $type_of_legal_problem != "No Injury" )
                {

                    $response = Http::withHeaders(["Authorization" => "Token 9680475e0e29d5a379ce183635129c6871f28cbe"])
                        ->post("https://api.jangl.com/v2/legal/capture", $body);

                    if( $response->getStatusCode() == 200 )
                    {
                        $camp->is_loved = $is_loved;
                        $camp->have_attorney = $have_attorney;
                        $camp->first_name = $first_name;
                        $camp->last_name = $last_name;
                        $camp->email = $email;
                        $camp->phone = $phone;
                        $camp->address = $address;
                        $camp->city = $city;
                        $camp->state = $state;
                        $camp->zip_code = $zip_code;
                        $camp->ip_address = $request->ip();
                        $camp->type_of_legal_problem = $type_of_legal_problem;

                        $camp->save();

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
        }
        else
        {
            return false;
        }



        // echo $response->getStatusCode();
    }

    // editing camp leads
    public function edit($id)
    {
        $camp_lejeune = CampLejeune::find($id);
        return view("Camp.camp_edit", [
            "camp_lejeune" => $camp_lejeune
        ]);
    }

    public function update(Request $request, $id)
    {
        $camp_lejeune = CampLejeune::find($id);
        $camp_lejeune->first_name = $request->get("first_name");
        $camp_lejeune->last_name = $request->get("last_name");
        $camp_lejeune->phone = $request->get("phone");
        $camp_lejeune->email = $request->get("email");
        $camp_lejeune->address = $request->get("address");
        $camp_lejeune->city = $request->get("city");
        $camp_lejeune->state = $request->get("state");
        $camp_lejeune->zip_code = $request->get("zip_code");
        $camp_lejeune->ip_address = $request->ip();
        $camp_lejeune->type_of_legal_problem = $request->get("type_of_legal_problem");

        $camp_lejeune->save();

        return back()->with("message", "Updated!");
    }

    // delete camp leads
    public function remove($id)
    {
        $camp = CampLejeune::find($id);
        $camp->delete();
        return back()->with("message", "deleted!");
    }
}
