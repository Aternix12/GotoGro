<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\TransactionItem;
use App\Models\GroceryItem;

class ReportController extends Controller
{
    public function index()
    {
        // $reports = Report::all();

        // Get all transactions

        // Get total count of Grocery Items, determine what is 20%
        // Use ceil because with too few items, it might allow for only one item be in this category
        $totalGroceryItems = GroceryItem::count();
        $boundary = ceil($totalGroceryItems * 0.2);

        // Get their TransactionItems
        $transactionItems = TransactionItem::all();
        $frequency = array();

        $groceryItems = GroceryItem::all();
        foreach ($groceryItems as $item) {
            $frequency[$item->ProductName] = 0;
        }

        foreach ($transactionItems as $t) {
            $item = $t->groceryItem;
            // $item = $item->ProductName;

            for ($i = 0; $i < $t->Quantity; $i++) {
                $frequency[$item->ProductName]++;
            }
        }

        arsort($frequency);

        $A = array_slice($frequency, 0, $boundary);

        $C = array_slice($frequency, -$boundary);

        $lengthB = count($frequency) - count($A) - count($C);

        $B = array_slice($frequency, count($A), (count($frequency) - count($A) - count($C)));

        return view('reports.index', compact('A', 'B', 'C'));
    }
}
