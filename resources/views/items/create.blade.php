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
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="text" name="Price" id="Price" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label for="CategoryID">Category</label>
                <select name="CategoryID" id="CategoryID" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->CategoryID }}">{{ $category->CategoryName }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="DepartmentID">Department</label>
                <select name="DepartmentID" id="DepartmentID" class="form-control" required>
                    @foreach ($departments as $department)
                        <option value="{{ $department->DepartmentID }}">{{ $department->DepartmentName }}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
