<?php

namespace App\Http\Controllers;

// This is a work in progress. as it stands it is a slightly edited copy of the member controller.
// the bellow video is how I feel whist doing this right now.
// https://www.youtube.com/watch?v=r7l0Rq9E8MY

use App\Models\Member;
use App\Models\Gender;
use App\Models\MemberStatuses;
use App\Models\TransactionOrder;
use App\Models\GroceryItem;
use Illuminate\Http\Request;

class TransactionOrderController extends Controller
{
    public function index()
    {   // resources/view/transactionOrder
        $TransactionOrder = TransactionOrder::all();
        return view('transactionOrder.index', compact('transactionOrder'));

    }

    public function create()
    {
        $TransactionID = Gender::all();
        return view('transactions.create', compact('genders', 'memberStatuses'));

    }

    public function store(Request $request)
    {
        Member::create($request->all());
        return redirect()->route('members.index');
    }

    public function show(Member $member)
    {
        return view('transactions.show', compact('member'));
    }

    public function edit(Member $member)
    {
        $genders = Gender::all();
        return view('transactions.edit', compact('member', 'genders', 'memberStatuses'));
    }

    public function update(Request $request, Member $member)
    {
        $member->update($request->all());
        return redirect()->route('transactions.index');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        TransactionOrder::create($request->all());
        return redirect()->route('transactions.index');
    }



    // Controller for salesTransaction stuff. will work on later. currently effectivly the same as above
    public function indexSales()
    {   // resources/view/transaction
        
        $SalesTransaction = SalesTransaction::all();
        return view('transactions.index', compact('salesTransactions'));
    }

    public function createSales()
    {
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
        $TransactionID = SalesTransaction::all();
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
