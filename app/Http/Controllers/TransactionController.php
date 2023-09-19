<?php

namespace App\Http\Controllers;
// This is a work in progress. as it stands it is a slightly edited copy of the member controller. 
// the bellow video is how I feel whist doing this right now.
// https://www.youtube.com/watch?v=r7l0Rq9E8MY


use App\Models\SalesTransaction;
use App\Models\GroceryItem;
use App\Models\Member;
use App\Models\TransactionOrder;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {   // resources/view/transactionOrder
        // Hope this works 
        $TransactionOrder = TransactionOrder::all();
        return view('transactions.index', compact('transactionOrder'));
    }

    public function create()
    {
        $GroceryID = GroceryItem::all();
        $MemberID = Member::all();
        return view('transactions.create', compact('GroceryID', 'MemberID'));
    }

    public function store(Request $request)
    {
        TransactionOrder::create($request->all());
        return redirect()->route('transactions.index');
    }

    public function show(TransactionOrder $TransactionOrder)
    {
        return view('transactions.show', compact('TransactionOrder'));
    }

    public function edit(TransactionOrder $TransactionOrder)
    {
        $TransactionID = SalesTransaction::all();
        $GroceryItemID = GroceryItem::all();
        return view('transactions.edit', compact('GroceryID', 'TransactionID'));
    }

    public function update(Request $request, TransactionOrder $TransactionOrder)
    {
        $TransactionOrder->update($request->all());
        return redirect()->route('transactions.index');
    }
    // to yeet the tuple
    public function destroy(TransactionOrder $TransactionOrder)
    {
        $TransactionOrder->delete();
        return redirect()->route('transactions.index');
    }
}
