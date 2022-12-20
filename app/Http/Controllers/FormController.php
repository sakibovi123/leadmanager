<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FormController extends Controller
{
    public function get_form_data(){
        $forms = Form::paginate(10);
        return response()->json([
            "status" => true,
            "data" => $forms
        ], 200);

    }

    public function post_json(Request $request){
        $form = new Form();

        $lp_campaign_id = $form->lp_campaign_id = "61c158df57694";
        $lp_campign_key = $form->lp_campaign_key = "MQkGFrhcbtx4BDzq87TP";
        $form->lp_supplier_id = "asdasd";

        $fName = $form->first_name = $request->get("first_name");
        $lName = $form->last_name = $request->get("last_name");
        $lPhone = $form->phone = $request->get("phone");
        $lEmail = $form->email = $request->get("email");
        $lZip = $form->zip_code = $request->get("zip_code");

        $data = [
            "first_name" => $fName,
            "last_name" => $lName,
            "phone" => $lPhone,
            "email" => $lEmail,
            "zip_code" => $lZip
        ];

        $vivint_response = $this->post_parameter_wise($request, $fName, $lName, $lPhone, $lEmail, $lZip, $lp_campaign_id, $lp_campign_key);
        $form->save();

        return response()->json([
            "status" => "success",
            "data" => $data,
            "vivint" => $vivint_response
        ], 201);


    }

    public function post_parameter_wise(Request $request, $lp_campaign_id, $lp_campaign_key, $first_name, $last_name, $email, $phone, $zip_code){
        $form = new Form();
        $fName = $form->first_name = $request->get($first_name);
        $lName = $form->last_name = $request->get($last_name);
        $cCmail = $form->email = $request->get($email);
        $cPhone = $form->phone = $request->get($phone);
        $zCode = $form->zip_code = $request->get($zip_code);

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
}
