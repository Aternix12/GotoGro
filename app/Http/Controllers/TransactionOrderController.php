<?php

namespace App\Http\Controllers;
// This is a work in progress. as it stands it is a slightly edited copy of the member controller. 
// the bellow video is how I feel whist doing this right now.
// https://www.youtube.com/watch?v=r7l0Rq9E8MY


use App\Models\SalesTransaction;
use App\Models\GroceryItem;
use App\Models\TransactionOrder;
use Illuminate\Http\Request;

class TransactionOrderController extends Controller
{
    public function index()
    {   // resources/view/transactionOrder
        // Hope this works 
        $TransactionOrder = TransactionOrder::all();
        return view('transactionOrder.index', compact('transactionOrder'));
    }

    public function create()
    {
        $TransactionID = SalesTransaction::all();
        $GroceryItemID = GroceryItem::all();
        return view('TransactionOrder.create', compact('TransactionID', 'GroceryID'));
    }

    public function store(Request $request)
    {
        TransactionOrder::create($request->all());
        return redirect()->route('TransactionOrder.index');
    }

    public function show(TransactionOrder $TransactionOrder)
    {
        return view('TransactionOrder.show', compact('TransactionOrder'));
    }

    public function edit(TransactionOrder $TransactionOrder)
    {
        $TransactionID = SalesTransaction::all();
        $GroceryItemID = GroceryItem::all();
        return view('TransactionOrder.edit', compact('GroceryID', 'TransactionID'));
    }

    public function update(Request $request, TransactionOrder $TransactionOrder)
    {
        $TransactionOrder->update($request->all());
        return redirect()->route('TransactionOrder.index');
    }
    // to yeet the tuple
    public function destroy(TransactionOrder $TransactionOrder)
    {
        $TransactionOrder->delete();
        return redirect()->route('TransactionOrder.index');
    }
}
