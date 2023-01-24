<?php

use Illuminate\Support\Facades\Http;

class MVAExchangeRepository
{
    private $first_name, $last_name, $phone, $email, $city, $state, $zip_code, $incident_date, $physical_injury, $currently_represented, $at_fault,
        $case_description, $ip_address, $user_agent, $landing_page;

    public function __construct($first_name, $last_name, $phone, $email, $city, $state, $zip_code,
                                $incident_date, $physical_injury, $currently_represented, $at_fault, $case_description, $ip_address, $user_agent, $landing_page
    )
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->phone = $phone;
        $this->email = $email;
        $this->city = $city;
        $this->state = $state;
        $this->zip_code = $zip_code;
        $this->incident_date = $incident_date;
        $this->physical_injury = $physical_injury;
        $this->currently_represented = $currently_represented;
        $this->at_fault = $at_fault;
        $this->case_description = $case_description;
        $this->ip_address = $ip_address;
        $this->user_agent = $user_agent;
        $this->landing_page = $landing_page;
    }


    public function send_data_to_leadprosper(
//        $first_name, $last_name, $phone, $email, $city, $state, $zip_code, $incident_date, $physical_injury, $currently_represented,
//        $at_fault,
    )
    {
        Http::post("", [
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "phone" => $this->phone,
            "email" => $this->email,
            "city" => $this->city,
            "state" => $this->state,
            "zip_code" => $this->zip_code,
            "incident_date" => $this->incident_date,
            "physical_injury" => $this->physical_injury,
            "currently_represented" => $this->currently_represented,
            "at_fault" => $this->at_fault,
            "case_description" => $this->case_description,
            "ip_address" => $this->ip_address,
            "user_agent" => $this->user_agent,
            "landing_page" => $this->landing_page
        ]);

    }
}
