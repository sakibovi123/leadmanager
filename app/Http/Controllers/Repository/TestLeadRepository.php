<?php

namespace App\Http\Controllers\Repository;

use App\Http\Controllers\Interface\TestLeadInterface;
use App\Models\Campaign;
use App\Models\Field;

class TestLeadRepository implements TestLeadInterface
{
    public function show_all_fields($campaign_id)
    {
        // TODO: Implement show_all_fields() method.
        $camp_id = Campaign::where("id", $campaign_id)->first();
        return Field::where("campaign_id", $camp_id->id)->get();
    }
}
