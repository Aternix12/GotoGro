@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Grocery Item</h1>

        <form action="{{ route('items.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="ProductName">Product Name</label>
                <input type="text" name="ProductName" id="ProductName" class="form-control {{ $errors->has('ProductName') ? 'is-invalid' : '' }}" novalidate>
                @error('ProductName')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="Stock">Stock</label>
                <input type="text" name="Stock" id="Stock" class="form-control {{ $errors->has('Stock') ? 'is-invalid' : '' }}" novalidate>
                @error('Stock')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="Price">Price</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="text" name="Price" id="Price" class="form-control {{ $errors->has('Price') ? 'is-invalid' : '' }}" novalidate>
                    @error('Price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="CategoryID">Category</label>
                <select name="CategoryID" id="CategoryID" class="form-control" novalidate>
                    @foreach ($categories as $category)
                        <option value="{{ $category->CategoryID }}">{{ $category->CategoryName }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="DepartmentID">Department</label>
                <select name="DepartmentID" id="DepartmentID" class="form-control" novalidate>
                    @foreach ($departments as $department)
                        <option value="{{ $department->DepartmentID }}">{{ $department->DepartmentName }}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
