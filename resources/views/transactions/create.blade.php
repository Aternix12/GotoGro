@extends('layouts.app')


@section('content')
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
        <title>Create Transaction Page</title>
    </head>
    <body>



    @section('content') 
    <nav class="header">
        <h1 class="Title">Add Transaction</h1>
    </nav>
    <div class="content">
        <div class="LeftGrid">
            <div class="LGwrapper">
                <a href="" id="Mylk"
                    ><img src= "{{ asset('css/img/mylk.png') }}" alt="Mylk"
                /></a>
            </div>
        </div>
        <div class="MiddleGrid addMember">
            <div class="MiddleGridContent">
                <div class="container">
                    <h1>Add Transaction Order</h1>
            
                    <form action="{{ route('transactions.store') }}" method="POST">
                        @csrf                 
                        <div class="form-group">
                            <label for="MemberID">Member ID</label>
                            <select name="MemeberID" id="MemberID" class="form-control" required>
                                @foreach ($MemberID as $member)
                                    <option value="{{ $member->MemberID }}">{{ $member->MemberID }}</option>
                                @endforeach
                            </select>
                        </div>
            
                        <div class="form-group">
                            <label for="GroceryID">Grocery Item ID</label>
                            <select name="GroceryID" id="GroceryID" class="form-control" required>
                                @foreach ($GroceryID as $item)
                                    <option value="{{ $item->GroceryID }}">{{ $item->Grocery }}</option>
                                @endforeach
                            </select>
                        </div>
            
                        <div class="form-group">
                            <label for="Quantity">Quantity</label>
                            <input type="text" name="Quantity" id="Quantity" class="form-control" required>
                        </div>
            
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                        <button type="submit" class="btn btn-primary">
                            Add Member
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection

@verbatim
<!-- </body>
</html> -->




<!--
Testing front end with included form 
@extends('layouts.app')
// work in progress
@section('content')
    <div class="container">
        <h1>Add Transaction Order</h1>

        <form action="{{ route('transaction_orders.store') }}" method="POST">
            @csrf
// transactionID, GroceryID, Quantity  

            // is this the right way around see line 15-17?
            <div class="form-group">
                <label for="MemberID">Member ID</label>
                <select name="MemeberID" id="MemberID" class="form-control" required>
                    @foreach ($member as $memberID)
                        <option value="{{ $member->MemberID }}">{{ $member->MemberID }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="GroceryID">Grocery Item ID</label>
                <select name="GroceryID" id="GroceryID" class="form-control" required>
                    @foreach ($item as $GroceryID)
                        <option value="{{ $item->GroceryID }}">{{ $item->Grocery }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="Quantity">Quantity</label>
                <input type="text" name="Quantity" id="Quantity" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

-->

@endverbatim