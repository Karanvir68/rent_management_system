<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationModel;

class ApplicationController extends Controller
{
    public function rent_details()
    {

        return view('rentdetails');
    }

    public function generate()
    {
        return view('generaterent');
    }

    public function Preview_Bill(Request $req)
    {
        $req->validate([
            'base_charge'    => 'required|numeric',
            'prev_units'     => 'required|numeric',
            'new_units'      => 'required|numeric',
            'charge'         => 'required|numeric|min:0',
            'type_of_charge' => 'required|string|max:255',
            'previous_due'   => 'nullable|numeric|min:0',
            'bill_date'      => 'required|date',
        ]);

        $prev_units = $req->prev_units;
        $new_units  = $req->new_units;

        $diff_units = $new_units - $prev_units;

        $bill = $diff_units * $req->charge;

        if ($req->previous_due > 0) {
            $bill += $req->previous_due;
        }

        if ($req->type_of_charge) {
            $bill += $req->price_of_other;
        }

        $insert_data = [
            'tenant_id' => $req->tenant_id,
            'base_charge'     => $req->base_charge,
            'prev_units'      => $prev_units,
            'new_units'       => $new_units,
            'charge'          => $req->charge,
            'type_of_charge'  => $req->type_of_charge,
            'price_of_other'  => $req->price_of_other,
            'previous_due'    => $req->previous_due ?? 0,
            'bill_date'       => $req->bill_date,
            'total'           => $bill,
            'status'          => ''
        ];

        ApplicationModel::create($insert_data);

        return view('preview', $insert_data);
    }
}
