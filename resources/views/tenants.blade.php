@extends('layouts.app')

@section('title','Tenants')

@section('content')

<div class="container mt-4">

<h2 class="mb-3">Manage Tenants</h2>
<div>
    @if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif
</div>
<div class="text-end mb-3">
<a href="{{route('create.tenants')}}" class="btn btn-success mb-3">
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
    <td>{{ date('d/m/Y', strtotime($row->created_at)) }}</td>
    <td>

        <a href="{{route('edit.tenant',$row->id)}}" class="btn btn-sm btn-primary">
            <i class="fa fa-pencil"></i>
        </a>

        <a href="" class="btn btn-sm btn-info text-white">
            <i class="fa fa-eye"></i>
        </a>

        <form action="{{ route('delete.tenant', $row->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this tenant?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i>
            </button>
        </form>

    </td>
</tr>
@endforeach
</tbody>

</table>

</div>
</div>

</div>

@endsection