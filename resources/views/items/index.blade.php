@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Grocery Items</h1>
        <a href="{{ route('items.create') }}" class="btn btn-grey">New Item</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groceryItems as $item)
                    <tr>
                        <td>{{ $item->GroceryID }}</td>
                        <td>{{ $item->ProductName }}</td>
                        <td>{{ $item->Stock }}</td>
                        <td>${{ number_format($item->Price, 2) }}</td>
                        <td>{{ $item->Location }}</td>
                        <td>
                            <a href="{{ route('items.show', $item->GroceryID) }}" class="btn btn-success"><i
                                    class="fas fa-edit"></i></a>
                            <a href="{{ route('items.destroy', $item->GroceryID) }}" class="btn btn-danger"><i
                                    class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
