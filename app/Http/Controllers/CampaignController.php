<?php

namespace App\Http\Controllers;

use App\Models\Field;
use Illuminate\Http\Request;
use App\Models\Campaign;

class CampaignController extends Controller
{
    public function index(){
        $camps = Campaign::all();
        return view("campaign.campaigns", [
            "camps" => $camps
        ]);
    }


    // details and edit

    public function details(string $campaign_uid){
        $camp = Campaign::where("campaign_uid", $campaign_uid)->first();
        $fields = Field::where("campaign_id", $camp->id)->get();
//        foreach($fields as $field)
//        {
//            echo $field->field_name;
//        }
//        die();
        return view("campaign.details", [
            "camp" => $camp,
            "fields" => $fields
        ]);
    }


    public function create_campaign()
    {
        return view("campaign.create_campaign");
    }

    // storing campaigns to the database

    public function store(Request $request){
        $camp = new Campaign();
        $camp->campaign_title = $request->input("campaign_title");
        $camp->campaign_uid = uniqid();
        $camp->save();

        return redirect()->back()->with("message", "Saved successfully");
    }

    public function add_fields_to_campaigns(Request $request, $campaign_uid)
    {
        $campaign = Campaign::where("campaign_uid", $campaign_uid)->first();
        $field = new Field();

        $field->field_name = $request->get("field_name");
        $field->field_type = $request->get("field_type");
        $is_required = $request->get("is_required");

        if( $is_required == "Yes" )
        {
            $field->is_required = 1;
        }
        else
        {
            $field->is_required = 0;
        }

        $field->save();

        foreach( $field as $f )
        {
            $field->campaign_id = $campaign->id;
            $field->save();
        }

        return back();
    }

    public function remove_field(Request $request)
    {
        $field = $request->get("f_id");
        Field::find($field)->delete();
        return back();
    }

    public function remove($id){
        $camp = Campaign::find($id);
        $camp->delete();
        return redirect()->back()->with("message", "Deleted");
    }





}
