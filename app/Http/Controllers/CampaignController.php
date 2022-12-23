<?php

namespace App\Http\Controllers;

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

    public function create(){
        return view("campaigns.create");
    }


    // storing campaigns to the database

    public function store(Request $request){
        $camp = new Campaign();

        $camp->campaign_title = $request->input("campaign_title");

        $camp->save();

        return redirect()->back()->with("message", "Saved successfully");
    }

    public function remove(Request $request, $id){
        $camp = Campaign::find($id);
        $camp->delete();
        return redirect()->back()->with("message", "Deleted");
    }
}
