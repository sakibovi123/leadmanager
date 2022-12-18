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

        $form->lp_campaign_id = "asdasd";
        $form->lp_campaign_key = "asdasd";
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


        $form->save();
        //$this->post_parameter_wise($fName, $lName, $lPhone, $lEmail, $lZip);
        return response()->json([
            "status" => "success",
            "data" => $data
        ], 201);


    }

    public function post_parameter_wise(Request $request, $first_name, $last_name, $email, $phone, $zip_code){
        $form = new Form();
        $fName = $form->first_name = $request->get($first_name);
        $lName = $form->last_name = $request->get($last_name);
        $cCmail = $form->email = $request->get($email);
        $cPhone = $form->phone = $request->get($phone);
        $zCode = $form->zip_code = $request->get($zip_code);

        $response = Http::post("", [
            "lp_campaign_id" => "",
            "lp_campaign_key" => "",
            "lp_supplier_id" => "",
            "first_name" => $fName,
            "last_name" => $lName,
            "email" => $cCmail,
            "phone" => $cPhone,
            "zip_code" => $zCode
        ]);

        dd($response);
    }
}
