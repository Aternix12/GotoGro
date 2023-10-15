<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Arr;
use App\Models\TransactionItem;
use App\Models\GroceryItem;


class ReportController extends Controller
{
    public function index()
    {
        $memberCount = Member::count();
        $totalGroceryItems = GroceryItem::count();
        $boundary = ceil($totalGroceryItems * 0.2);

        // Efficient way to get frequencies
        $transactionItems = TransactionItem::with('groceryItem')
            ->selectRaw('GroceryID, SUM(quantity) as sum')
            ->groupBy('GroceryID')
            ->get();

        $frequency = [];

        foreach ($transactionItems as $t) {
            $frequency[$t->groceryItem->ProductName] = $t->sum;
        }

        arsort($frequency);

        $A = array_slice($frequency, 0, $boundary);
        $C = array_slice($frequency, -$boundary);
        $B = array_slice($frequency, count($A), count($frequency) - count($A) - count($C));

        return view('reports.index', compact('A', 'B', 'C', 'memberCount'));
    }
}
