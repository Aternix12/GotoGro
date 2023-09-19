<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap"
            rel="stylesheet"
        />
        <title>Create Item Page</title>
    </head>
    <body>
        <nav class="header">
            <h1 class="Title">Add Items</h1>
        </nav>
        <div class="content">
            <div class="LeftGrid">
                <a href="" id="Mylk" >
                    <img src= "{{ asset('css/img/mylk.png') }}" alt="Mylk"/>
                </a>
            </div>

            <div class="MiddleGrid addItem">
                <div class="MiddleGridContent">
                    <div class="container">
                        <h1>Add Grocery Item</h1>

                        <form action="{{ route('items.store') }}" method="POST">
                            @csrf

                            <div class="form-group create-item">
                                <label class="formPrompt" for="ProductName">Product Name</label>
                                <input
                                    type="text"
                                    name="ProductName"
                                    id="ProductName"
                                    class="form-control"
                                    required
                                />
                            </div>

                            <div class="form-group create-item">
                                <label class="formPrompt" for="Stock">Stock</label>
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
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="text" name="Price" id="Price" class="form-control" required>
                </div>
            </div>

                            <div class="form-group create-item">
                                <label  class="formPrompt" for="Location">Location</label>
                                <input
                                    type="text"
                                    name="Location"
                                    id="Location"
                                    class="form-control"
                                    required
                                />
                            </div>
                            <div class="create-button">
                                <button type="submit" class="btn btn-primary">
                                    Add Item
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

