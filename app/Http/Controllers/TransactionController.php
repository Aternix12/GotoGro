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
            $grocery = GroceryItem::find($groceryId); // Assuming the grocery model has a 'Price' field
            $totalAmount += $grocery->Price * $quantity;
        }

        // Create a new transaction
        $transaction = new Transaction();
        $transaction->MemberID = $memberId;
        $transaction->TotalAmount = $totalAmount;  // Set the total amount
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
}




    /*
    // Controller for salesTransaction stuff. will work on later. currently effectivly the same as above
    // returning differnet page. All transacitions for a given day
    public function indexSales()
    {   // resources/view/transaction

        $Transaction = Transaction::all();
        return view('transactions.index', compact('salesTransactions'));
    }

    public function createSales()
    { //
        $GroceryID = GroceryItem::all();
        $MemberID = Member::all();
        return view('transactions.create', compact('GroceryID', 'MemberID'));
    }

    public function storeSales(Request $request)
    {
        TransactionOrder::create($request->all());
        return redirect()->route('transactions.index');
    }

    public function showSales(TransactionOrder $TransactionOrder)
    {
        return view('transactions.show', compact('TransactionOrder'));
    }

    // edit details for order status
    public function editSales(OrderStatus $orderStatus)
    {
        $OrderStatusID = OrderStatus::all();
        return view('transactions.edit', compact('OrderStatusID'));
    }

    public function updateSales(Request $request, Transaction $Transaction)
    {
        $Transaction->update($request->all());
        return redirect()->route('transactions.create');
    }
    // to yeet the tuple
    public function destroySales(Transaction $Transaction)
    {
        $Transaction->delete();
        return redirect()->route('transactions.create');
    }
}
*/
