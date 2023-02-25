<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $table = "leads";

    // protected $fillable = ["lp_campaign_id", "lp_campaign_key", "first_name", "last_name", "phone", "email", "zip_code", "campaign_id"];
    protected $fillable = [
        "lead_uid", "campaign_id", "payload"
    ];

    public function campaign(){
        return $this->belongsTo(Campaign::class, "campaign_id");
    }
}
