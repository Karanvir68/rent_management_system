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
                                <a href="{{ route('edit.tenant', $row->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-info text-white" title="View" data-bs-toggle="modal" data-bs-target="#billModal" data-bill-id="{{ $row->id }}" data-base-charge="{{ $row->base_charge }}" data-prev-units="{{ $row->prev_units }}" data-new-units="{{ $row->new_units }}" data-total="{{ $row->total }}" data-bill-date="{{ $row->bill_date }}" data-status="{{ $row->status }}">
                                    <i class="fa fa-eye"></i>
                                </button>
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

<!-- Bill Details Modal -->
<div class="modal fade" id="billModal" tabindex="-1" aria-labelledby="billModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #e8ddf5 !important;">
                <h5 class="modal-title" id="billModalLabel">Bill Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless">
                    <tr>
                        <th>Bill ID:</th>
                        <td id="modalBillId">-</td>
                    </tr>
                    <tr>
                        <th>Base Charge:</th>
                        <td id="modalBaseCharge">-</td>
                    </tr>
                    <tr>
                        <th>Previous Units:</th>
                        <td id="modalPrevUnits">-</td>
                    </tr>
                    <tr>
                        <th>New Units:</th>
                        <td id="modalNewUnits">-</td>
                    </tr>
                    <tr>
                        <th>Total Amount:</th>
                        <td id="modalTotal">-</td>
                    </tr>
                    <tr>
                        <th>Bill Date:</th>
                        <td id="modalBillDate">-</td>
                    </tr>
                    <tr>
                        <th>Status:</th>
                        <td><span id="modalStatus" class="badge">-</span></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="markPaidBtn">
                    <i class="fa fa-check"></i> Mark as Paid
                </button>
            </div>
        </div>
    </div>
</div>



@endsection