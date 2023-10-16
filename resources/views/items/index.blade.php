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
              data-target="Health"
              type="button"
              role="tab"
              aria-controls="milk"
              aria-selected="true"
              data-category-id="1"

            >
              Health
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="bread-tab"
              data-toggle="pill"
              data-target="Beauty"
              type="button"
              role="tab"
              aria-controls="bread"
              aria-selected="false"
              data-category-id="2"
            >
              beauty
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="vegetable-tab"
              data-toggle="Cookware"
              data-target="3"
              type="button"
              role="tab"
              aria-controls="vegetable"
              aria-selected="false"
              data-category-id="3"
            >
              Cookware
            </button>
          </li>
          <li class="nav-item" role="presentation">
            <button
              class="nav-link"
              id="beauty-tab"
              data-toggle="Confectionary"
              data-target="4"
              type="button"
              role="tab"
              aria-controls="beauty"
              aria-selected="false"
              data-category-id="4"
            >
              Confectionary
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
        <table class="table" id = "table-body">
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
    <script>
          // custom.js

$(document).ready(function () {
    $('.nav-link').click(function () {
        var categoryId = $(this).data('category-id');

        $.ajax({
            type: 'GET',
            url: '/get-items-by-category',
            data: { categoryId: categoryId },
            success: function (data) {
                updateTable(data);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    function updateTable(data) {
    var tableBody = $('#table-body'); // Assuming your table body has an ID of 'table-body'
    tableBody.empty();

    for (var i = 0; i < data.length; i++) {
        var row = '<tr>';
        row += '<td>' + (data[i].GroceryID || '') + '</td>';
        row += '<td>' + (data[i].ProductName || '') + '</td>';
        row += '<td>' + (data[i].Stock || '') + '</td>';
        row += '<td>$' + (data[i].Price ? data[i].Price.toFixed(2) : '') + '</td>';
        row += '<td>' + ((data[i].category && data[i].category.CategoryName) || '') + '</td>';
        row += '<td>' + ((data[i].department && data[i].department.DepartmentName) || '') + '</td>';
        row += '<td>';
        row += '<a href="/items/' + (data[i].GroceryID || '') + '" class="btn btn-success"><i class="fas fa-edit"></i></a>';
        row += '<form action="/items/' + (data[i].GroceryID || '') + '" method="POST" style="display: inline;">';
        row += '@csrf';
        row += '@method("DELETE")';
        row += '<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>';
        row += '</form>';
        row += '</td>';
        row += '</tr>';

        tableBody.append(row);
    }
}

});

    </script>
@endsection
