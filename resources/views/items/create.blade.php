@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Grocery Item</h1>

        <form action="{{ route('items.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="ProductName">Product Name</label>
                <input type="text" name="ProductName" id="ProductName" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Stock">Stock</label>
                <input type="text" name="Stock" id="Stock" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Price">Price</label>
                <input type="text" name="Price" id="Price" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Location">Location</label>
                <input type="text" name="Location" id="Location" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection