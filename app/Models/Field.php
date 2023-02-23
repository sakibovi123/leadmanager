<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;
    protected $table = "fields";

    protected $fillable = [
        "field_name", "field_type", "is_required"
    ];

    public function campaigns()
    {
        return $this->belongsTo(Campaign::class);
    }
}
