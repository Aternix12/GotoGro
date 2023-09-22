<?php

namespace App\Http\Controllers;
// This is a work in progress. as it stands it is a slightly edited copy of the member controller. 
// the bellow video is how I feel whist doing this right now.
// https://www.youtube.com/watch?v=r7l0Rq9E8MY


use App\Models\SalesTransaction;
use App\Models\GroceryItem;
use App\Models\Member;
use App\Models\Transaction;
use App\Models\TransactionOrder;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {   // resources/view/transactionOrder
        // Hope this works 
        $TransactionOrder = TransactionOrder::all();
        return view('transactions.index', compact('transactionOrder')); // will send data to transaction order to create the order table entry
    }
    // links to transaction create page. Creating a new transaction being the product in the order.
    public function create()
    {   // all are being sent to the page create transaction. this fills in all the data from the DB
        $GroceryID = GroceryItem::all();
        $MemberID = Member::all();
        return view('transactions.create', compact('GroceryID', 'MemberID')); // return so it can be called in blade. All return views will do this
    }

    // store and request. is the sending of information via submit. This is the entire contents of the webpage form.
    public function store(Request $request)
    {
        TransactionOrder::create($request->all());
        return redirect()->route('transactions.create'); // this is not finished right now. There is alot that still needs to be done here. This is the link between both memeb and transaciot table effectivlty
    } // return redirect will return the the chosen page. 

    // to view an individual transaciton. maybe if it can be done. Sprint 2 
    public function show(TransactionOrder $TransactionOrder)
    {
        return view('transactions.show', compact('TransactionOrder'));
    }

    //self explanitory
    public function edit(TransactionOrder $TransactionOrder)
    {
        $TransactionID = Transaction::all();
        $GroceryItemID = GroceryItem::all();
        return view('transactions.edit', compact('GroceryID', 'TransactionID'));
    }

    public function update(Request $request, TransactionOrder $TransactionOrder)
    {
        $TransactionOrder->update($request->all());
        return redirect()->route('transactions.create');
    }
    // to yeet the tuple
    public function destroy(TransactionOrder $TransactionOrder)
    {
        $TransactionOrder->delete();
        return redirect()->route('transactions.create');
    }


    // Controller for salesTransaction stuff. will work on later. currently effectivly the same as above
    // returning differnet page. All transacitions for a given day
    public function indexSales()
    {   // resources/view/transaction
        
        $Transaction = Transaction::all();
        return view('transactions.index', compact('salesTransactions'));
    }

    public function createSales()
    {//
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

    public function editSales(TransactionOrder $TransactionOrder)
    {
        $TransactionID = Transaction::all();
        $GroceryItemID = GroceryItem::all();
        return view('transactions.edit', compact('GroceryID', 'TransactionID'));
    }

    public function updateSales(Request $request, TransactionOrder $TransactionOrder)
    {
        $TransactionOrder->update($request->all());
        return redirect()->route('transactions.index');
    }
    // to yeet the tuple
    public function destroySales(TransactionOrder $TransactionOrder)
    {
        $TransactionOrder->delete();
        return redirect()->route('transactions.index');
    }
}