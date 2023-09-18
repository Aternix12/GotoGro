@extends('layouts.app')
// work in progress
@section('content')
    <div class="container">
        <h1>Add Transaction Order</h1>

        <form action="{{ route('transaction_orders.store') }}" method="POST">
            @csrf
// transactionID, GroceryID, Quantity  

            // is this the right way around see line 15-17?
            <div class="form-group">
                <label for="MemberID">Member ID</label>
                <select name="MemeberID" id="MemberID" class="form-control" required>
                    @foreach ($member as $memberID)
                        <option value="{{ $member->MemberID }}">{{ $member->MemberID }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="GroceryID">Grocery Item ID</label>
                <select name="GroceryID" id="GroceryID" class="form-control" required>
                    @foreach ($item as $GroceryID)
                        <option value="{{ $item->GroceryID }}">{{ $item->Grocery }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="Quantity">Quantity</label>
                <input type="text" name="Quantity" id="Quantity" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection