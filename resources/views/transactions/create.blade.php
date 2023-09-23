@extends('layouts.app')
@section('content')
    <div class="MiddleGrid addMember">
        <div class="MiddleGridContent">
            <div class="container">
                <h1 class="Header">Add Transaction Order</h1>

                <form action="{{ route('transactions.store') }}" method="POST" class="form">
                    @csrf
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
                        <label for="GrocerySearch">Search Grocery</label>
                        <div class="input-group">
                            <input type="text" placeholder="Enter Grocery Name" id="GrocerySearch" class="form-control">
                            <div class="input-group-append">
                                <button id="clearGrocerySearch" class="btn btn-outline-secondary"
                                    type="button">Clear</button>
                            </div>
                        </div>
                        <div id="GrocerySearchResults" class="list-group" style="display:none;"></div>
                    </div>

                    <h2>Selected Grocery Items</h2>
                    <table id="selectedGroceries" class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                    <div id="groceryItems" style="display:none;"></div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            </form>
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

            $('#GrocerySearch').on('input', function() {
                let query = $(this).val();
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
                                #${item.GroceryID} ${item.ProductName}
                            </a>`;
                                });
                                $('#GrocerySearchResults').html(output).show();
                            } else {
                                $('#GrocerySearchResults').hide();
                            }
                        }
                    });
                } else {
                    $('#GrocerySearchResults').hide();
                }
            });

            $('#GrocerySearchResults').on('click', 'a.list-group-item', function(e) {
                e.preventDefault();
                let itemId = $(this).data('id');
                let itemName = $(this).text().trim();

                // Add the selected grocery to the table
                $('#selectedGroceries tbody').append(`
            <tr data-id="${itemId}">
                <td>${itemName}</td>
                <td><input type="number" value="1" class="form-control quantity-input"></td>
                <td><button class="btn btn-danger delete-item">Delete</button></td>
            </tr>
        `);

                // Create hidden input for the selected item and append to the form
                let hiddenInput = $('<input>').attr({
                    type: 'hidden',
                    name: 'groceryItems[' + itemId + ']', // use an array-based name
                    value: 1 // initial quantity
                });

                $('#groceryItems').append(hiddenInput);

                $('#GrocerySearchResults').hide();
            });

            $('#clearGrocerySearch').on('click', function() {
                $('#GrocerySearch').val('');
                $('#GrocerySearchResults').hide();
            });

            // Delete item from the table and also remove the hidden input field
            $('#selectedGroceries').on('click', '.delete-item', function() {
                let itemId = $(this).closest('tr').data('id');
                $(this).closest('tr').remove();
                $('input[name="groceryItems[' + itemId + ']"]').remove();
            });

            // Listen to changes on the quantity inputs
            $('#selectedGroceries').on('input', '.quantity-input', function() {
                let itemId = $(this).closest('tr').data('id');
                let newQuantity = $(this).val();
                $('input[name="groceryItems[' + itemId + ']"]').val(newQuantity);
            });
        });
    </script>
@endsection
