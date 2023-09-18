@extends('layouts.app')

@section('content')

<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="Dale Bent" />
        <meta name="keywords" content="HTML5, tags, CSS" />
        <link rel="stylesheet" href="/resources/css/app.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap"
            rel="stylesheet"
        />
        <title>Add Item Page</title>
    </head>
    <body>
        <nav class="header">
            <h1 class="Title">Add Items</h1>
        </nav>
        <div class="content">
            <div class="LeftGrid">
                <a href="mylk.com" id="Mylk"
                    ><img src="/App/Webpages/img/mylk.png" alt="Mylk" />
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
    </body>
</html>
@endsection