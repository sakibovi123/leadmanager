<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /* index function for showing all clients  */

    public function index()
    {
        $clients = Client::all()->sortBy("-created_at");
        return view("Clients.clients", [
            "clients" => $clients
        ]);
    }

    /* create template function */
    public function create()
    {
        return view("Clients.create");
    }


    /* saving clients data into the database */
    public function save(Request $request)
    {
        $first_name = $request->get("first_name");
        $last_name = $request->get("last_name");
        $company_name = $request->get("company_name");
        $email = $request->get("email");
        $phone_number = $request->get("phone_number");

        try
        {
            $client = new Client();

            $client->first_name = $first_name;
            $client->last_name = $last_name;
            $client->phone_number = $phone_number;
            $client->email = $email;
            $client->company_name = $company_name;

            // checking if not company empty
            if( !empty($company_name) )
            {
                $client->save();
                return back()->with("message", "Client Added Successfully!");
            }

            else
            {
                return back()->with("message", "Client Added Successfully!");
            }

        }
        catch(Exception $e)
        {
            echo $e;
        }
    }


    /* edit template function */
    protected function edit($client_id)
    {
        $client = Client::find($client_id);
        return view("Clients.edit", [
            "client" => $client
        ]);
    }


    /* updating client data and saving to database */
    public function update(Request $request, $client_id)
    {
        $client = Client::find($client_id);
        $client->company_name = $request->get("company_name");
        $client->first_name = $request->get("first_name");
        $client->last_name = $request->get("last_name");
        $client->email = $request->get("email");
        $client->phone_number = $request->get("phone_number");

        if( !empty( $client->company_name ) )
        {
            $client->save();
            return redirect()->with("message", "updated successfully!");
        }
        else{
            return back()->with("message", "failed updating data");
        }
    }


    /* delete function for removing client */
    public function remove(Request $request, $client_id)
    {
        $client = Client::find($client_id);
        $client_id->delete();
        return redirect()->with("message", "Deleted Successfully!");
    }
}
