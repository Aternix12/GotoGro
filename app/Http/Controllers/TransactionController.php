<?php

namespace App\Http\Controllers;
// This is a work in progress. as it stands it is a slightly edited copy of the member controller.
// the bellow video is how I feel whist doing this right now.
// https://www.youtube.com/watch?v=r7l0Rq9E8MY

use App\Models\GroceryItem;
use App\Models\Member;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TransactionController extends Controller
{
    // links to transaction create page. Creating a new transaction being the product in the order.
    public function create()
    {   // all are being sent to the page create transaction. this fills in all the data from the DB
        $GroceryID = GroceryItem::all();
        $MemberID = Member::all();
        return view('transactions.create', compact('GroceryID', 'MemberID'));
        // return so it can be called in blade. All return views will do this
    }

    // store and request. is the sending of information via submit. This is the entire contents of the webpage form.
    public function store(Request $request)
    {
        // Get the member ID
        $memberId = $request->input('MemberID');

        // Get the selected grocery items and their quantities
        $groceryItems = $request->input('groceryItems');

        // Initialize total amount
        $totalAmount = 0;

        // Loop to calculate the total amount first
        foreach ($groceryItems as $groceryId => $quantity) {
            $grocery = GroceryItem::find($groceryId);
            $totalAmount += $grocery->Price * $quantity;
        }

        // Fetch the ID for the "Active" status
        $activeStatusId = DB::table('order_statuses')->where(
            'OrderStatus',
            'Active'
        )->first()->OrderStatusID;

        // Create a new transaction
        $transaction = new Transaction();
        $transaction->MemberID = $memberId;
        $transaction->TotalAmount = $totalAmount;  // Set the total amount
        $transaction->OrderStatusID = $activeStatusId;  // Set the status to "Active"
        $transaction->Date = Carbon::now();  // Set the current date
        $transaction->save();

        // Loop through each selected grocery item and save it
        foreach ($groceryItems as $groceryId => $quantity) {
            $transactionItem = new TransactionItem();
            $transactionItem->TransactionID = $transaction->id;
            $transactionItem->GroceryID = $groceryId;
            $transactionItem->Quantity = $quantity;
            $transactionItem->save();
        }

        // Redirect or whatever you want to do next
        return redirect()->route('transactions.create');
    }


    public function edit(Transaction $transaction)
    {
        $existingTransactionItems = $transaction->transactionItems;
        // Fetch transaction items associated with this transaction

        return view('transactions.edit', [
            'transaction' => $transaction,  // The transaction you want to edit
            'existingTransactionItems' => $existingTransactionItems // Existing transaction items for this transaction
        ]);
    }


    public function update(Request $request, Transaction $Transaction)
    {
        $Transaction->update($request->all());
        return redirect()->route('transactions.create');
    }
    // to yeet the tuple
    public function destroy(Transaction $Transaction)
    {
        $Transaction->delete();
        return redirect()->route('transactions.create');
    }

    public function show($id)
    {
        $transaction = Transaction::with(['transactionItems.groceryItem', 'memberID', 'orderSatusID'])->findOrFail($id);
        $orderStatuses = OrderStatus::all();

        return view('transactions.show', [
            'transaction' => $transaction,
            'orderStatuses' => $orderStatuses
        ]);
    }
}
