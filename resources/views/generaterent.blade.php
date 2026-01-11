@extends('layouts.app')

@section('title', 'Home')

@section('content')
<h2>Generate Bill Statement</h2>
<head>
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
</head>
<br>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="container mt-3" action="{{ 'previewbill' }}" method="post">
  @csrf
<div class="row mb-3">
    <div class="col-md-6">
      <div class="row align-items-center">
        <div class="col-md-4">
          <label for="base_charge" class="form-label mb-0">Base charge *</label>
        </div>
        <div class="col-md-6">
          <input type="text" name="base_charge" id="base_charge" class="form-control">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row align-items-center">
        <div class="col-md-4">
          <label for="tenant_id" class="form-label mb-0">Tenant *</label>
        </div>
        <div class="col-md-6">
          <select class="form-control" id="tenant_id" name="tenant_id">
            <option>--Select tenant--</option>
            <option value="1">Simranjeet</option>
            <option value="2">Kuber</option>
          </select>
        </div>
      </div>
    </div>
</div>
  <div class="row mb-3">
    <div class="col-md-6">
      <div class="row align-items-center">
        <div class="col-md-4">
          <label for="prev_units" class="form-label mb-0">Previous Reading *</label>
        </div>
        <div class="col-md-6">
          <input type="text" name="prev_units" id="prev_units" class="form-control">
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="row align-items-center">
        <div class="col-md-4">
          <label for="new_units" class="form-label mb-0">New Reading *</label>
        </div>
        <div class="col-md-6">
          <input type="text" name="new_units" id="new_units" class="form-control">
        </div>
      </div>
    </div>
  </div>

  
  <div class="row mb-3">
    <div class="col-md-6">
      <div class="row align-items-center">
        <div class="col-md-4">
          <label for="charge" class="form-label mb-0">Charge (/Unit) *</label>
        </div>
        <div class="col-md-6">
          <input type="number" name="charge" id="charge" class="form-control">
        </div>
      </div>
    </div>
  </div>


<h6>Water charges</h6>
<div class="row mb-3">
    <div class="col-md-6">
      <div class="row align-items-center">
        <div class="col-md-4">
          <label for="prev_water_units" class="form-label mb-0">Previous Reading *</label>
        </div>
        <div class="col-md-6">
          <input type="text" name="prev_water_units" id="prev_water_units" class="form-control">
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="row align-items-center">
        <div class="col-md-4">
          <label for="new_water_units" class="form-label mb-0">New Reading *</label>
        </div>
        <div class="col-md-6">
          <input type="text" name="new_water_units" id="new_water_units" class="form-control">
        </div>
      </div>
    </div>
  </div>

  
  <div class="row mb-3">
    <div class="col-md-6">
      <div class="row align-items-center">
        <div class="col-md-4">
          <label for="water_charge" class="form-label mb-0">Charge (/Unit) *</label>
        </div>
        <div class="col-md-6">
          <input type="number" name="water_charge" id="water_charge" class="form-control" required>
        </div>
      </div>
    </div>
  </div>

  <h6>Other charges</h6>
<div class="row mb-3">
    <div class="col-md-6">
      <div class="row align-items-center">
        <div class="col-md-4">
          <label for="type_of_charge" class="form-label mb-0">Type Of Charge *</label>
        </div>
        <div class="col-md-6">
          <input type="text" name="type_of_charge" id="type_of_charge" class="form-control" required>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="row align-items-center">
        <div class="col-md-4">
          <label for="price_other" class="form-label mb-0">Price *</label>
        </div>
        <div class="col-md-6">
          <input type="text" name="price_other" id="price_other" class="form-control" required>
        </div>
      </div>
    </div>
  </div>

  
  <div class="row mb-3">
    <div class="col-md-6">
      <div class="row align-items-center">
        <div class="col-md-4">
          <label for="quantity_other" class="form-label mb-0">Quantity</label>
        </div>
        <div class="col-md-6">
          <input type="number" name="quantity_other" id="quantity_other" class="form-control" required>
        </div>
      </div>
    </div>
  </div>

<div class="row mb-3">
  <!-- Left field -->
  <div class="col-md-6">
    <div class="row align-items-center">
      <div class="col-md-4">
        <label for="previous_due" class="form-label mb-0">Previous dues (if any)</label>
      </div>
      <div class="col-md-6">
        <input type="text" name="previous_due" id="previous_due" class="form-control" required>
      </div>
    </div>
  </div>

  <!-- Right field -->
  <div class="col-md-6">
    <div class="row align-items-center">
      <div class="col-md-4">
        <label for="bill_date" class="form-label mb-0">Date of bill</label>
      </div>
      <div class="col-md-6">
        <input type="date" name="bill_date" id="bill_date" value="<?php echo date('Y-m-d'); ?>" class="form-control" required>
      </div>
    </div>
  </div>
</div>
<button type="submit" name="preview_bill" class="btn btn-success">Preview</button>
</form>


  
@endsection