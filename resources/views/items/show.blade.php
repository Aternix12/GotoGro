@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Grocery Item</h1>

        <form action="{{ route('items.update', $item->GroceryID) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="ProductName">Product Name</label>
                <input type="text" name="ProductName" id="ProductName" class="form-control" value="{{ $item->ProductName }}"
                    required>
            </div>

            <div class="form-group">
                <label for="Stock">Stock</label>
                <input type="text" name="Stock" id="Stock" class="form-control" value="{{ $item->Stock }}"
                    required>
            </div>

            <div class="form-group">
                <label for="Price">Price</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="text" name="Price" id="Price" class="form-control" value="{{ $item->Price }}"
                        required>
                </div>
            </div>

            <div class="form-group">
                <label for="Location">Location</label>
                <input type="text" name="Location" id="Location" class="form-control" value="{{ $item->Location }}"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
