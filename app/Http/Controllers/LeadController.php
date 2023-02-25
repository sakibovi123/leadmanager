<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interface\LeadInterface;
use App\Models\Campaign;
use App\Models\CampLejeune;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LeadController extends Controller
{
    private $leadInterface;

    public function __construct(LeadInterface $leadInterface)
    {
        $this->leadInterface = $leadInterface;
    }

    public function leads(Request $request)
    {
        $query = Lead::query();
        $campaigns = Campaign::all();

        if($request->ajax())
        {
            $leads = $query->where("campaign_id", $request->get("lead_filter"))->get();
            return response()->json(["leads" => $leads]);
        }
        $leads = $query->get();
        return view("leads.leads", [
            "leads" => $leads,
            "campaigns" => $campaigns
        ]);
    }

    public function get_form_data(){
        $leads = Lead::all();

        return response()->json([
            "status" => "success",
            "data" => $leads
        ], 200);

    }

    public function store_leads(Request $request)
    {
        //
    }


    public function filter_by_campaign($campaign_id)
    {
        $campaign = Campaign::where("id", $campaign_id)->first();
        $leads = Lead::where("campaign_id", $campaign->id)->get();
        return response()->json([
            "data" => $leads
        ], 200);
    }

}
