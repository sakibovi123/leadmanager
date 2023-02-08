<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampLejeune extends Model
{
    use HasFactory;

    protected $table = "camp_lejeunes";

    protected $fillable = [
        "is_loved", "have_attorney", "first_name", "last_name", "email", "phone", "address", "city", "state", "zip_code", "ip_address", "type_of_legal_problem", "is_valid"
    ];


}
