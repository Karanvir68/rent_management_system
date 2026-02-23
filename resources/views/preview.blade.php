@extends('layouts.app')

@section('title', 'Rent Bill Preview')

@section('content')

<div class="container">
    <div class="card shadow">
        <div class="card-body">

            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Rent Bill</h2>
                <div class="text-end">
                    <strong>Date:</strong> {{ $bill_date }}
                </div>
            </div>

            <hr>

            {{-- Tenant Info --}}
            <div class="mb-4">
                <h5>Bill To:</h5>
                <p class="mb-0"><strong>Mr. Simranjeet Singh</strong></p>
            </div>

            {{-- Rent & Electricity Details --}}
            <h5 class="mb-3">Rent & Electricity Details</h5>

            <table class="table table-bordered">
                <tr>
                    <th width="50%">Base Rent</th>
                    <td>₹ {{ number_format($base_charge, 2) }}</td>
                </tr>
                <tr>
                    <th>Previous Meter Units</th>
                    <td>{{ $prev_units }}</td>
                </tr>
                <tr>
                    <th>Current Meter Units</th>
                    <td>{{ $new_units }}</td>
                </tr>
                <tr>
                    <th>Electricity Charge</th>
                    <td>₹ {{ number_format($charge, 2) }}</td>
                </tr>
            </table>

            {{-- Other Charges --}}
            <h5 class="mt-4">Other Charges</h5>

            <table class="table table-bordered">
                <tr>
                    <th width="50%">Type of Charge</th>
                    <td>{{ $type_of_charge }}</td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td>₹ {{ number_format($price_of_other, 2) }}</td>
                </tr>
            </table>

            {{-- Previous Due & Total --}}
            <h5 class="mt-4">Summary</h5>

            <table class="table table-bordered">
                <tr>
                    <th width="50%">Previous Due</th>
                    <td>₹ {{ number_format($previous_due, 2) }}</td>
                </tr>
                <tr class="table-primary">
                    <th>Total Payable Amount</th>
                    <td><strong>₹ {{ number_format($total, 2) }}</strong></td>
                </tr>
            </table>

            {{-- Action Buttons --}}
            <div class="d-flex justify-content-end mt-4 gap-2">
                <a href="" class="btn btn-secondary">
                    Edit Bill
                </a>

                <a href="" class="btn btn-success">
                    Generate PDF
                </a>
            </div>

        </div>
    </div>
</div>

@endsection