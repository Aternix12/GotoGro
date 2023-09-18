@extends('layouts.app')

@section('content')


        <nav class="header">
            <h1 class="Title">Add Items</h1>
        </nav>
        <div class="content">
            <div class="LeftGrid">
                <a href="" id="Mylk"
                    ><img src="/resources/css/img/mylk.png" alt="Mylk" />
                </a>
            </div>

            <div class="MiddleGrid addItem">
                <div class="MiddleGridContent">
                    <div class="container">
                        <h1>Add Grocery Item</h1>

                        <form action="{{ route('items.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="ProductName">Product Name</label>
                                <input
                                    type="text"
                                    name="ProductName"
                                    id="ProductName"
                                    class="form-control"
                                    required
                                />
                            </div>

                            <div class="form-group">
                                <label for="Stock">Stock</label>
                                <input
                                    type="text"
                                    name="Stock"
                                    id="Stock"
                                    class="form-control"
                                    required
                                />
                            </div>

                            <div class="form-group">
                                <label for="Price">Price</label>
                                <input
                                    type="text"
                                    name="Price"
                                    id="Price"
                                    class="form-control"
                                    required
                                />
                            </div>

                            <div class="form-group">
                                <label for="Location">Location</label>
                                <input
                                    type="text"
                                    name="Location"
                                    id="Location"
                                    class="form-control"
                                    required
                                />
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Add Item
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection