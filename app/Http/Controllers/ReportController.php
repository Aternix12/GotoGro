<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Arr;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\GroceryItem;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->input('dateReport') ?? Carbon::now()->toDateString();

        $startDate = Carbon::parse($date)->startOfDay();
        $endDate = Carbon::parse($date)->endOfDay();

        $totalTransactions = Transaction::whereBetween('Date', [$startDate, $endDate])->count();
        $totalSales = Transaction::whereBetween('Date', [$startDate, $endDate])->sum('TotalAmount');
        $newMembers = Member::whereBetween('created_at', [$startDate, $endDate])->count();

        $memberCount = Member::count();
        $totalGroceryItems = GroceryItem::count();
        $boundary = ceil($totalGroceryItems * 0.2);

        $transactionItems = TransactionItem::with('groceryItem')
            ->selectRaw('GroceryID, SUM(quantity) as sum')
            ->groupBy('GroceryID')
            ->get();

        $frequency = [];

        foreach ($transactionItems as $t) {
            $frequency[$t->groceryItem->ProductName] = $t->sum;
        }

        arsort($frequency);

        $a = array_slice($frequency, 0, $boundary);
        $c = array_slice($frequency, -$boundary);
        $b = array_slice($frequency, count($a), count($frequency) - count($a) - count($c));

        return view('reports.index', compact('totalTransactions', 'newMembers', 'a', 'b', 'c', 'memberCount', 'totalGroceryItems', 'totalSales', 'date'));
    }
}
