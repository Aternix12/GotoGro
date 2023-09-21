@extends('layouts.app')
@section('content')
    <div class="content">
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

                        <input type="hidden" name="MemberID" id="MemberID" value="">

                        <div class="form-group">
                            <label for="MemberSearch">Search Member</label>
                            <div class="input-group">
                                <input type="text" placeholder="Enter a First Name or Last Name" id="MemberSearch"
                                    class="form-control">
                                <div class="input-group-append">
                                    <button id="clearMemberSearch" class="btn btn-outline-secondary"
                                        type="button">Clear</button>
                                </div>
                            </div>
                            <!-- Container to show search results -->
                            <div id="MemberSearchResults" class="list-group" style="display:none;"></div>
                        </div>


                        <div class="form-group">
                            <label for="GroceryID">Grocery Item ID</label>
                            <select name="GroceryID" id="GroceryID" class="form-control" required>
                                @foreach ($GroceryID as $item)
                                    <option value="{{ $item->GroceryID }}">{{ $item->GroceryID }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="GroceryItemSearch">Search Grocery Item</label>
                            <div class="input-group">
                                <input type="text" placeholder="Enter grocery item name" id="GroceryItemSearch"
                                    class="form-control">
                                <div class="input-group-append">
                                    <button id="clearGroceryItemSearch" class="btn btn-outline-secondary"
                                        type="button">Clear</button>
                                </div>
                            </div>
                            <!-- Container to show search results -->
                            <div id="GroceryItemSearchResults" class="list-group" style="display:none;"></div>

                            <table class="table" id="GroceryItemTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Location</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div class="form-group">
                            <label for="Quantity">Quantity</label>
                            <input type="text" name="Quantity" id="Quantity" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#MemberSearch').on('input', function() {
                let query = $(this).val();

                // Only proceed if at least 2 characters have been entered
                if (query.length >= 2) {
                    $.ajax({
                        url: '/search/members',
                        method: 'GET',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            let output = '';
                            if (data.length > 0) {
                                data.forEach(function(member) {
                                    output += `
                                <a href="#" class="list-group-item list-group-item-action" data-id="${member.MemberID}">
                                    #${member.MemberID} ${member.FirstName} ${member.LastName} ${member.Email}
                                </a>`;
                                });
                                $('#MemberSearchResults').html(output).show();
                            } else {
                                $('#MemberSearchResults').hide();
                            }
                        }
                    });
                } else {
                    $('#MemberSearchResults').hide();
                }
            });

            $('#MemberSearchResults').on('click', 'a.list-group-item', function(e) {
                e.preventDefault();
                let memberId = $(this).data('id');
                let memberName = $(this).text().trim(); // Using .trim() to remove whitespace

                // Set the hidden input value to the selected member ID
                $('#MemberID').val(memberId);

                // Set the search input value to the selected member name
                $('#MemberSearch').val(memberName);

                // Hide the search results
                $('#MemberSearchResults').hide();
            });

            // Clear button click event
            $('#clearMemberSearch').on('click', function() {
                // Clear the search input value
                $('#MemberSearch').val('');

                // Clear the hidden input for MemberID
                $('#MemberID').val('');

                // Hide the search results
                $('#MemberSearchResults').hide();
            });

            $('#GroceryItemSearch').on('input', function() {
                let query = $(this).val();
                console.log(query)

                // Only proceed if at least 2 characters have been entered
                if (query.length >= 2) {
                    $.ajax({
                        url: '/search/items',
                        method: 'GET',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            let output = '';
                            if (data.length > 0) {
                                data.forEach(function(item) {
                                    output += `
                                <a href="#" class="list-group-item list-group-item-action" data-id="${item.GroceryID}">
                                    #${item.GroceryID} ${item.ProductName} ${item.Price}
                                </a>`;
                                });
                                $('#GroceryItemSearchResults').html(output).show();
                            } else {
                                $('#GroceryItemSearchResults').hide();
                            }
                        }
                    });
                } else {
                    $('#GroceryItemSearchResults').hide();
                }
            });

            $('#GroceryItemSearchResults').on('click', 'a.list-group-item', function(e) {
                e.preventDefault();
                let groceryItemId = $(this).data('id');
                let memberName = $(this).text().trim(); // Using .trim() to remove whitespace

                // Add grocery item to table
                $('#GroceryItemTable').append(`<tr><td>${groceryItemId}</td></tr>`)

                // // Set the hidden input value to the selected member ID
                // $('#GroceryItemID').val(memberId);

                // // Set the search input value to the selected member name
                // $('#GroceryItemSearch').val(memberName);

                // Hide the search results
                $('#GroceryItemSearchResults').hide();
            });

            // Clear button click event
            $('#clearGroceryItemSearch').on('click', function() {
                // Clear the search input value
                $('#GroceryItemSearch').val('');

                // Clear the hidden input for GroceryItemID
                $('#GroceryItemID').val('');

                // Hide the search results
                $('#GroceryItemSearchResults').hide();
            });
        });
    </script>
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
