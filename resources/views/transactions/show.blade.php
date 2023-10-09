@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Transaction Details</h1>
            </div>
            <div class="col-md-4 text-right">
                <h5>Date: {{ $transaction->Date }}</h5>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                Member Information
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $transaction->memberID->FirstName }} {{ $transaction->memberID->LastName }}</h5>
                <p class="card-text">{{ $transaction->memberID->Email }}</p>
                <a href="{{ route('members.edit', $transaction->memberID->MemberID) }}" class="btn btn-primary">Edit
                    Member</a>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php $sum = 0; @endphp
                @foreach ($transaction->transactionItems as $item)
                    <tr>
                        <td>{{ $item->groceryItem->id }}</td>
                        <td>{{ $item->groceryItem->ProductName }}</td>
                        <td>{{ $item->groceryItem->Price }}</td>
                        <td>{{ $item->Quantity }}</td>
                        <td>{{ $item->groceryItem->Price * $item->Quantity }}</td>
                    </tr>
                    @php $sum += $item->groceryItem->Price * $item->Quantity; @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total Amount:</th>
                    <th>{{ $sum }}</th>
                </tr>
            </tfoot>
        </table>

        <div class="row mt-4">
            <div class="col-md-8">
                <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="OrderStatusID">Order Status:</label>
                        <select name="OrderStatusID" id="OrderStatusID" class="form-control">
                            @foreach ($orderStatuses as $status)
                                <option value="{{ $status->id }}"
                                    {{ $transaction->OrderStatusID == $status->id ? 'selected' : '' }}>
                                    {{ $status->status_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </form>
            </div>
        </div>
    </div>
@endsection
