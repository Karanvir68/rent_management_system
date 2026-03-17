@extends('layouts.app')

@section('title','Add')

@section('content')

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header">
            <h5 class="mb-0">Add Tenant</h5>
        </div>

        <div class="card-body">
            <form action="{{route('add.tenants')}}" method="POST">
                @csrf
                

                <div class="row">
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tenant Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Mobile</label>
                        <input type="text" name="mobile" class="form-control"  required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Base Rent</label>
                        <input type="number" name="base_rent" class="form-control" required>
                    </div>

                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">
                        Update Tenant
                    </button>

                    <a href="{{ url()->previous() }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>


@endsection