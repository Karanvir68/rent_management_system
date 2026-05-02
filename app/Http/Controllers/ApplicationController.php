<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationModel;
use App\Models\Tenants;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Symfony\Component\Console\Application;

class ApplicationController extends Controller
{
    public function rent_details()
    {

        return view('rentdetails');
    }

    public function generate()
    {
        $tenants = Tenants::all();
        return view('generaterent',compact('tenants'));
    }

    public function Preview_Bill(Request $req)
    {
        $req->validate([
            'base_charge'    => 'required|numeric',
            'prev_units'     => 'required|numeric',
            'new_units'      => 'required|numeric',
            'charge'         => 'required|numeric|min:0',
            'previous_due'   => 'nullable|numeric|min:0',
            'bill_date'      => 'required|date'
        ]);

        $prev_units = $req->prev_units;
        $new_units  = $req->new_units;

        $diff_units = $new_units - $prev_units;

        $bill = $diff_units * $req->charge;

        $bill += $req->base_charge;

        if ($req->previous_due > 0) {
            $bill += $req->previous_due;
        }

        if ($req->type_of_charge) {
            $bill += $req->price_other;
        }

        $data = [
            'tenant_id' =>    $req->tenant_id,
            'base_charge'     => $req->base_charge,
            'prev_units'      => $prev_units,
            'new_units'       => $new_units,
            'charge'          => $req->charge,
            'type_of_charge'  => $req->type_of_charge,
            'price_of_other'  => $req->price_other,
            'previous_due'    => $req->previous_due ?? 0,
            'bill_date'       => $req->bill_date,
            'total'           => $bill,
            'status'          => ''
        ];

        //dd($data);

        ApplicationModel::create($data);

        $tenants = Tenants::findOrFail($req->tenant_id);

        $data['tenant_name'] =  trim($tenants->name);

        $data['sub_total'] = $bill - ($req->base_charge);

        $data['electricity_bill'] = $diff_units * $req->charge;
       
        $pdf = Pdf::loadView('invoice',$data);

        return $pdf->stream($data['tenant_name'] .'_'.date('M').'.pdf');

        //return view('preview', $data);
    }

    public function bill_details(){
        $bills = ApplicationModel::all();

        return view('billdetails',['bills' => $bills]);
    }

    public function editBill($id){

        $bill = ApplicationModel::FindorFail($id);

        return view('editbill',['bill'=>$bill]);
    }

    public function updateBill(Request $req, $id){

    $req->validate([
       'current_due' => 'required',
       'status' => 'required'
    ]);

       $bill = ApplicationModel::FindorFail($id);

       

       $bill->update([
        $bill->status = $req->status,
        $bill->current_due = $req->current_due
       ]);

       return redirect('billdetails')->with('success','Bill updated successfuly');
    }
}
