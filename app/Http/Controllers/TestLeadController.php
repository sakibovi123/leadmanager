<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Interface\TestLeadInterface;
use App\Models\Campaign;
use App\Models\Field;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class TestLeadController extends Controller
{
    private $testLeadInterface;

    public function __construct(TestLeadInterface $testLeadInterface)
    {
        $this->testLeadInterface = $testLeadInterface;
    }

    public function index($campaign_id)
    {
        $camp = Campaign::where("id", $campaign_id)->first();
        $fields = $this->testLeadInterface->show_all_fields($campaign_id);
        return view("TestLead.test_lead", [
            "fields" => $fields,
            "camp" => $camp
        ]);
    }

    public function send_test_lead(Request $request, $campaign_id)
    {
        $camp = Campaign::where("id", $campaign_id)->first();
        // $fields = $this->testLeadInterface->show_all_fields($campaign_id);
        $fields = $request->all();

        $body = $fields;
        $response = Http::post("https://hooks.zapier.com/hooks/catch/13844305/b7dn9h8/", $body);
        $lead = new Lead();
        $lead->lead_uid = uniqid();
        $lead->campaign_id = $camp->id;
        $lead->payload = json_encode($fields);
        $lead->save();

        return $response;
    }
}
