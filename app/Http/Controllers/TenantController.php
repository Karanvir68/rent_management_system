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
}
