<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;


    protected $table = "forms";

    protected $fillable = [
        "lp_campaign_id", "lp_campaign_key", "lp_supplier_id", "first_name", "last_name", "phone", "email", "zip_code"
    ];
}
