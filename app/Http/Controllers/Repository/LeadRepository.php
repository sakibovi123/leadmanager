<?php

namespace App\Http\Controllers\Repository;

use App\Http\Controllers\Interface\LeadInterface;
use App\Models\Campaign;
use App\Models\Lead;

class LeadRepository implements LeadInterface
{
    public function show_all_leads()
    {
        // TODO: Implement show_all_leads() method.
        return Lead::all();
    }

    public function showLeadsByCampaign($campaign_id)
    {
        // TODO: Implement showLeadsByCampaign() method.
        $campaign = Campaign::where("id", $campaign_id)->first();
        return Lead::where("camapaign_id", $campaign->id)->get();
    }

    public function store_leads($data)
    {
        // TODO: Implement store_leads() method.
        return Lead::create($data);
    }

    public function remove_lead($lead_id)
    {
        // TODO: Implement remove_lead() method.
        $lead = Lead::find($lead_id);
        return $lead->delete();
    }
}
