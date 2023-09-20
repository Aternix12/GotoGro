<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Gender;
use App\Models\MemberStatus;
use App\Models\SalesTransaction;
use App\Models\TransactionOrder;
use App\Models\GroceryItem;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        $genders = Gender::all();
        $memberStatuses = MemberStatus::all();
        return view('members.create', compact('genders', 'memberStatuses'));
    }

    public function store(Request $request)
    {
        Member::create($request->all());
        return redirect()->route('members.index');
    }

    public function show(Member $member)
    {
        // Get Transactions
        $transactions = $member->salesTransactions();

        // Get Top 5 Grocery Items

        // Get grocery items from all transactions
        $items = [];
        foreach ($transactions as $t) {
            $transactionItems = $t->transactionOrders();

            foreach ($transactionItems as $item) {
                $items[] = $item->groceryItem();
            }
        }

        // Get repeated ones
        $itemFrequencies = array();
        foreach ($items as $item) {
            if (array_key_exists($item->ProductName, $itemFrequencies)) {
                $itemFrequencies[$item->ProductName]++;
            } else {
                $itemFrequencies[$item->ProductName] = 1;
            }
        }

        // Descending order
        arsort($itemFrequencies);
        
        // Select top 5
        $topFiveItems = [
            $itemFrequencies[0],
            $itemFrequencies[1],
            $itemFrequencies[2],
            $itemFrequencies[3],
            $itemFrequencies[4],
        ];

        return view('members.show', compact('member', 'transactions', 'topFiveItems'));
    }

    public function edit(Member $member)
    {
        $genders = Gender::all();
        $memberStatuses = MemberStatus::all();
        $member->DateOfBirth = \Carbon\Carbon::parse($member->DateOfBirth);
        return view('members.show', compact('member', 'genders', 'memberStatuses'));
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

    public function search(Request $request)
    {
        $searchTerm = $request->input('query');
        info('Search term is: ' . $searchTerm);
        $members = Member::where('FirstName', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('LastName', 'LIKE', '%' . $searchTerm . '%')
            ->get();
        info('Members found are: ' . $members);

        return response()->json($members);
    }
}
