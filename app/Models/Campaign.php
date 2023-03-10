<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $table = "campaigns";

    protected $fillable = [ "campaign_title" ];

    public function fields()
    {
        return $this->hasMany(Field::class);
    }

    public function lead(){
        return $this->hasMany(Lead::class);
    }
}
