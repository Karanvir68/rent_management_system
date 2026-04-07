@extends('layouts.app')

@section('title','Edit')

@section('content')

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header">
            <h5 class="mb-0">Edit Bill Status</h5>
        </div>

        @if($errors->any())
        <div class="alert alert danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
         @endif
        <div class="card-body">
            <form action="{{route('update.bill', $bill->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Total Bill</label>
                        <input type="text" name="name" class="form-control" value="{{ $bill->total }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Due Amount</label>
                        <input type="text" name="current_due" class="form-control" value="{{ $bill->current_due }}" required>
                    </div>

                    

                </div>

                <div class="row">
                    
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Action</label>
                        <select name = "status" class="form-control" id="status" required>
                            <option value="">-- Select action --</option>
                            <option value="Pending" {{ $bill->status == 'Pending' ? 'selected' : ''}}>Pending</option>
                            <option value="Paid" {{ $bill->status == 'Paid' ? 'selected' : ''}}>Paid</option>
                            <option value="Partial" {{ $bill->status == 'Partial' ? 'selected' : ''}}>Partial</option>

                        </select>
</div>

                    

                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">
                        Update Bill status
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