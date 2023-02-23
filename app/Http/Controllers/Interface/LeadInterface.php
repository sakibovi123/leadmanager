<?php
namespace App\Http\Controllers\Interface;

Interface LeadInterface
{
    public function show_all_leads();
    public function showLeadsByCampaign($campaign_id);
    public function store_leads($data);
    public function remove_lead($lead_id);
}
