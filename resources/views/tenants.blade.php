@extends('layouts.app')

@section('title','Tenants')

@section('content')

<div class="container mt-4">

<h2 class="mb-3">Manage Tenants</h2>
<div class="text-end mb-3">
<a href="" class="btn btn-success mb-3">
    <i class="fa fa-plus"></i> Add Tenant
</a>
</div>


<div class="card shadow">
<div class="card-body">

<table class="table table-striped table-hover ">
    <thead class="table-dark">
        <tr>
            <th>S No.</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Base Rent</th>
            <th>Joined On</th>
            <th width="150">Action</th>
        </tr>
    </thead>

<tbody>
@foreach($tenants as $row)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $row->name }}</td>
    <td>{{ $row->mobile }}</td>
    <td>₹{{ $row->base_rent }}</td>
    <td>{{ date('d/m/Y', strtotime($row->started_on)) }}</td>
    <td>

        <a href="" class="btn btn-sm btn-primary">
            <i class="fa fa-pencil"></i>
        </a>

        <a href="" class="btn btn-sm btn-info text-white">
            <i class="fa fa-eye"></i>
        </a>

        <a href="" class="btn btn-sm btn-danger">
            <i class="fa fa-trash"></i>
        </a>

    </td>
</tr>
@endforeach
</tbody>

</table>

</div>
</div>

</div>

@endsection