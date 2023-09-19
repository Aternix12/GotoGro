@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Add Transaction Order</h1>
        <form action="{{ route('transactionOrder.store') }}" method="POST">
            @csrf
// transactionID, GroceryID, Quantity  
            <div class="form-group">
                <label for="MemberID">Member ID</label>
                <select name="MemeberID" id="MemberID" class="form-control" required>
                    @foreach ($memberStatuses as $status)
                        <option value="{{ $member->MemberID }}">{{ $member->MemberID }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="ItemID">Grocery Item ID</label>
                <select name="ItemID" id="ItemID" class="form-control" required>
                    @foreach ($genders as $gender)
                        <option value="{{ $item->ItemID }}">{{ $item->ItemID }}</option>
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