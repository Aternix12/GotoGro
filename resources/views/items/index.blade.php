@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Grocery Items</h1>
        <a href="{{ route('items.create') }}" class="btn rounded-btn mb-3">Add Grocery Item</a>
        @isset($newGroceryItem)
            <div class="alert alert-success" role="alert" style="position: unset;">
                <p>
                    <strong>Success: </strong>
                    {{ $newGroceryItem->ProductName }} was created! 
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
        <ul class="custom-tabs nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button
              class="nav-link active"
              id="milk-tab"
              data-toggle="pill"
              data-target="#milk"
              type="button"
              role="tab"
              aria-controls="milk"
              aria-selected="true"
            >
              Milk
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="bread-tab"
              data-toggle="pill"
              data-target="#bread"
              type="button"
              role="tab"
              aria-controls="bread"
              aria-selected="false"
            >
              Bread
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="vegetable-tab"
              data-toggle="pill"
              data-target="#vegetable"
              type="button"
              role="tab"
              aria-controls="vegetable"
              aria-selected="false"
            >
              Vegetable
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="beauty-tab"
              data-toggle="pill"
              data-target="#beauty"
              type="button"
              role="tab"
              aria-controls="beauty"
              aria-selected="false"
            >
              Beauty
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="health-tab"
              data-toggle="pill"
              data-target="#health"
              type="button"
              role="tab"
              aria-controls="health"
              aria-selected="false"
            >
              Health
            </button>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div
            class="tab-pane fade show active"
            id="milk"
            role="tabpanel"
            aria-labelledby="milk-tab"
          >
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
