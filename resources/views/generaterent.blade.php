@extends('layouts.app')

@section('title', 'Home')

@section('content')
<head>
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>

<div class="py-4">
  <div class="card border shadow-sm mx-auto" style="max-width: 780px; border-radius: 12px; overflow: hidden;">

    {{-- Card header --}}
    <div class="card-header d-flex align-items-center gap-2 bg-white border-bottom py-3 px-4">
      <div class="rounded-2 d-flex align-items-center justify-content-center bg-primary bg-opacity-10" style="width:32px; height:32px;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#0d6efd" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14,2 14,8 20,8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
      </div>
      <div>
        <p class="mb-0 fw-medium">Generate bill statement</p>
        <p class="mb-0 text-muted" style="font-size:12px;">Fill in the details below to preview the bill</p>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger rounded-0 mb-0">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form id="myform" action="{{ 'previewbill' }}" method="post">
      @csrf

      {{-- Basic info --}}
      <div class="px-4 py-3 border-bottom">
        <p class="text-uppercase text-muted mb-3" style="font-size:11px; letter-spacing:.06em; font-weight:500;">Basic info</p>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label small text-muted">Tenant <span class="text-danger">*</span></label>
            <select class="form-select form-select-sm" id="tenant_id" name="tenant_id">
              <option>— select tenant —</option>
              @foreach($tenants as $tenant)
              <option value="{{ $tenant->id }}">{{ $tenant->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label small text-muted">Base charge <span class="text-danger">*</span></label>
            <input type="text" name="base_charge" id="base_charge" class="form-control form-control-sm" placeholder="e.g. 500">
          </div>
        </div>
      </div>

      {{-- Meter readings --}}
      <div class="px-4 py-3 border-bottom">
        <p class="text-uppercase text-muted mb-3" style="font-size:11px; letter-spacing:.06em; font-weight:500;">Meter readings</p>
        <div class="row g-3">
          <div class="col-md-4">
            <label class="form-label small text-muted">Previous reading <span class="text-danger">*</span></label>
            <input type="text" id="prev_units" name="prev_units" class="form-control form-control-sm" placeholder="e.g. 1200">
          </div>
          <div class="col-md-4">
            <label class="form-label small text-muted">New reading <span class="text-danger">*</span></label>
            <input type="text" id="new_units" name="new_units" class="form-control form-control-sm" placeholder="e.g. 1350">
            <small id="reading_error" class="text-danger" style="display:none;">New reading must exceed previous reading</small>
          </div>
          <div class="col-md-4">
            <label class="form-label small text-muted">Charge per unit <span class="text-danger">*</span></label>
            <input type="number" name="charge" class="form-control form-control-sm" placeholder="e.g. 8">
          </div>
        </div>
      </div>

      {{-- Other charges --}}
      <div class="px-4 py-3 border-bottom">
        <p class="text-uppercase text-muted mb-3" style="font-size:11px; letter-spacing:.06em; font-weight:500;">Other charges</p>
        <div class="row g-3">
          <div class="col-md-4">
            <label class="form-label small text-muted">Type of charge</label>
            <input type="text" name="type_of_charge" class="form-control form-control-sm" placeholder="e.g. Maintenance">
          </div>
          <div class="col-md-4">
            <label class="form-label small text-muted">Price</label>
            <input type="text" name="price_other" class="form-control form-control-sm" placeholder="e.g. 200">
          </div>
          <div class="col-md-4">
            <label class="form-label small text-muted">Quantity</label>
            <input type="number" name="quantity_other" class="form-control form-control-sm" placeholder="e.g. 1">
          </div>
        </div>
      </div>

      {{-- Billing details --}}
      <div class="px-4 py-3 border-bottom">
        <p class="text-uppercase text-muted mb-3" style="font-size:11px; letter-spacing:.06em; font-weight:500;">Billing details</p>
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label small text-muted">Previous dues</label>
            <input type="text" name="previous_due" class="form-control form-control-sm" placeholder="0 if none" required>
          </div>
          <div class="col-md-6">
            <label class="form-label small text-muted">Bill date</label>
            <input type="date" name="bill_date" value="{{ date('Y-m-d') }}" class="form-control form-control-sm" required>
          </div>
        </div>
      </div>

      {{-- Footer --}}
      <div class="px-4 py-3 d-flex justify-content-end">
        <button type="submit" name="preview_bill" class="btn btn-primary btn-sm d-flex align-items-center gap-2">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
          Preview bill
        </button>
      </div>

    </form>
  </div>
</div>

<script>
  //new units validation
  const newUnit = document.getElementById('new_units');
  const prevUnit = document.getElementById('prev_units');
  const jsError = document.getElementById('reading_error');
  const form = document.getElementById('myform');

  function validateReading() {
    const n = Number(newUnit.value), p = Number(prevUnit.value);
    if (newUnit.value && prevUnit.value && n < p) {
      jsError.style.display = 'block';
      newUnit.classList.add('is-invalid');
      return false;
    }
    jsError.style.display = 'none';
    newUnit.classList.remove('is-invalid');
    return true;
  }

  newUnit.addEventListener('input', validateReading);
  prevUnit.addEventListener('input', validateReading);
  form.addEventListener('submit', e => { if (!validateReading()) e.preventDefault(); });

  //getting base charge from tenant_id
  let tenant = document.getElementById('tenant_id');
  let basecharge =  document.getElementById('base_charge');

  let prev_units = document.getElementById('prev_units');

  tenant.addEventListener('change',function(){

  let tenant_id = tenant.value;

      if(!tenant_id){
        basecharge.value = '';
        return;
      }

      fetch(`get-basecharge/${tenant_id}`)
      .then(response => response.json())
      .then(data=>{
        basecharge.value = data.base_charge;
      })
      .catch(error =>{
        console.log('Error: ', error);
      });

      fetch(`get_tenantDetails/${tenant_id}`)
      .then(response => response.json())
      .then(data => {
         prev_units.value = data.prev_units;
  })
  .catch(error =>{
      console.log('Prev units error: ', error);
  })
  })


//getting other details from tenant_id




</script>
@endsection