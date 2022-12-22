<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ViewController extends Controller
{
    public function index(){
        $leads = Lead::all();
        return view("index", [
            "leads" => $leads
        ]);
    }



}
