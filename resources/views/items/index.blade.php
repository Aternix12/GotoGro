@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Grocery Items</h1>
        <a href="{{ route('items.create') }}" class="btn rounded-btn mb-3">Add Grocery Item</a>
        @isset($newGroceryItem)
            <div class="alert alert-success" role="alert" style="position: unset;">
                <p>
                    <strong>Success: </strong>
                    {{ $newGroceryItem->ProductName }} was successfully created! 
                    <a href="{{ route('items.show', $newGroceryItem->GroceryID) }}" class="btn btn-primary btn-sm">Edit</a>
                </p>
                <p>
                    <span class="badge badge-secondary">Stock: {{ $newGroceryItem->Stock }}</span>
                    <span class="badge badge-secondary">Price: ${{ number_format($newGroceryItem->Price, 2) }}</span>
                    <span class="badge badge-secondary">Category: {{ $newGroceryItem->category->CategoryName }}</span>
                    <span class="badge badge-secondary">Department: {{ $newGroceryItem->department->DepartmentName }}</span>
                </p>
            </div>
        @endisset
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Department</th>
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
                        <td>{{ $item->category->CategoryName }}</td>
                        <td>{{ $item->department->DepartmentName }}</td>
                        <td>
                            <a href="{{ route('items.show', $item->GroceryID) }}" class="btn btn-success"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{ route('items.destroy', $item->GroceryID) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
