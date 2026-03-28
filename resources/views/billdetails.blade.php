@extends('layouts.app')

@section('title','Bill Details')

@section('content')

<div class="container mt-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Bill Details</h2>
        <a href="{{ route('generate') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> Generate Bill
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            @if($bills->count() > 0)
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="background-color: #e8ddf5 !important; color: #4a235a !important;">S No.</th>
                            <th style="background-color: #e8ddf5 !important; color: #4a235a !important;">Base Charge</th>
                            <th style="background-color: #e8ddf5 !important; color: #4a235a !important;">Prev Units</th>
                            <th style="background-color: #e8ddf5 !important; color: #4a235a !important;">New Units</th>
                            <th style="background-color: #e8ddf5 !important; color: #4a235a !important;">Total Amount</th>
                            <th style="background-color: #e8ddf5 !important; color: #4a235a !important;">Bill Date</th>
                            <th style="background-color: #e8ddf5 !important; color: #4a235a !important;">Status</th>
                            <th style="background-color: #e8ddf5 !important; color: #4a235a !important;" width="120">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bills as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>₹{{ number_format($row->base_charge, 2) }}</td>
                            <td>{{ $row->prev_units }}</td>
                            <td>{{ $row->new_units }}</td>
                            <td>₹{{ number_format($row->total, 2) }}</td>
                            <td>{{ date('d/m/Y', strtotime($row->bill_date)) }}</td>
                            <td>
                                <span class="badge {{ $row->status == 'Paid' ? 'bg-success' : 'bg-warning' }}">
                                    {{ $row->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('edit.bill', $row->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-info text-center">
                    <i class="fa fa-inbox fa-2x mb-3"></i>
                    <p>No bills found. <a href="">Generate a bill</a></p>
                </div>
            @endif
        </div>
    </div>
</div>




@endsection