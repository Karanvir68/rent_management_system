<?php

namespace App\Http\Controllers;

use App\Models\Tenants;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function viewTenants(){

        $tenants = Tenants::all();
        return view('tenants',['tenants' => $tenants]);
    }

    public function editTenant($id){
        //dd($id);
       
        $tenant = Tenants::FindorFail($id);
        return view('editTenant',['tenant'=>$tenant]);
    }

    public function updateTenant(Request $request, $id){

    $request->validate([
        'name' => 'required',
        'mobile' => 'required|numeric',
        'base_rent' => 'required|numeric'
    ]);

    $tenant = Tenants::FindorFail($id);

    $tenant->update([
      $tenant->name = $request->name,
      $tenant->mobile = $request->mobile,
      $tenant->base_rent = $request->base_rent,
    ]);

    return redirect('tenants')->with('success','Record updated successfully');

    }

    public function createTenant(){

        return view('createtenant');
    }

    public function addTenant(Request $request){
    
       $request->validate([
          'name' => 'required',
          'mobile' => 'required|numeric',
          'base_rent' => 'required'
       ]);

       Tenants::create($request->all());

       return redirect('tenants')->with('success', 'New Tenant Added successfully');

    }

    public function deleteTenant($id){
        $tenant = Tenants::findOrFail($id);
        $tenant->delete();
        return redirect('tenants')->with('success', 'Tenant deleted successfully');
    }

    public function get_basecharge($id){

    $tenants = Tenants::FindorFail($id);

    return response()->json(
        ['base_charge' => $tenants->base_rent]
    );

    }
}
