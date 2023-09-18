<?php

namespace App\Http\Controllers;
// This is a work in progress. as it stands it is a slightly edited copy of the member controller. 
// the bellow video is how I feel whist doing this right now.
// https://www.youtube.com/watch?v=r7l0Rq9E8MY

use App\Models\Member;
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
        $memberID = MemberID::all();
        $memberID = MemberID::all();
        return view('members.create', compact('genders', 'memberStatuses'));
    }

    public function store(Request $request)
    {
        Member::create($request->all());
        return redirect()->route('members.index');
    }

    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    public function edit(Member $member)
    {
        $genders = Gender::all();
        $memberStatuses = MemberStatus::all();
        return view('members.edit', compact('member', 'genders', 'memberStatuses'));
    }

    public function update(Request $request, Member $member)
    {
        $member->update($request->all());
        return redirect()->route('members.index');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index');
    }
}
