<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LeadController extends Controller
{

    public function leads(){
        return view("leads.leads", []);
    }

    public function get_form_data(){
        $leads = Lead::all();

        return response()->json([
            "status" => "success",
            "data" => $leads
        ], 200);


    }

    public function post_json(Request $request) {
        $lead = new Lead();

        $lp_campaign_id = $lead->lp_campaign_id = "61c158df57694";
        $lp_campign_key = $lead->lp_campaign_key = "MQkGFrhcbtx4BDzq87TP";
        $lead->lp_supplier_id = "asdasd";

        $fName = $lead->first_name = $request->get("first_name");
        $lName = $lead->last_name = $request->get("last_name");
        $lPhone = $lead->phone = $request->get("phone");
        $lEmail = $lead->email = $request->get("email");
        $lZip = $lead->zip_code = $request->get("zip_code");

        $CRMKEY = $lead->campaign_id = $request->get("campaign_id");

        $data = [
            "first_name" => $fName,
            "last_name" => $lName,
            "phone" => $lPhone,
            "email" => $lEmail,
            "zip_code" => $lZip,
            "crm_key" => $CRMKEY
        ];

        //$vivint_response = $this->post_parameter_wise($request, $fName, $lName, $lPhone, $lEmail, $lZip, $lp_campaign_id, $lp_campign_key);
        $lead->save();


        return response()->json([
            "status" => "success",
            "data" => $data,
            //"vivint" => $vivint_response
        ], 201);


    }

    public function post_parameter_wise(Request $request, $lp_campaign_id, $lp_campaign_key, $first_name, $last_name, $email, $phone, $zip_code){
        $lead = new Lead();
        $fName = $lead->first_name = $request->get($first_name);
        $lName = $lead->last_name = $request->get($last_name);
        $cCmail = $lead->email = $request->get($email);
        $cPhone = $lead->phone = $request->get($phone);
        $zCode = $lead->zip_code = $request->get($zip_code);

        $response = Http::post(
            "https://t.vivint.com/post.do?lp_campaign_id=".$lp_campaign_id."&lp_campaign_key=".$lp_campaign_key."&first_name=".$fName."&last_name=".$lName."&email=".$cCmail."&phone=".$cPhone."&zip_code=".$zCode, []);

//         $response = Http::post("https://t.vivint.com/post.do", [

//             "query" => [
//                 "lp_campaign_id" => $lp_campaign_id,
//                 "lp_campaign_key" => $lp_campaign_key,
// //            "lp_supplier_id" => "",
//                 "first_name" => $fName,
//                 "last_name" => $lName,
//                 "email" => $cCmail,
//                 "phone" => $cPhone,
//                 "zip_code" => $zCode,
//                 "lp_respose" => "jSON"
//             ]
//         ]);

        return response()->json([
            "status" => "vivint striked",
            "response" => $response
        ], 200);
    }


    public function email_validation() {}
}
