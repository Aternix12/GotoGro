<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Arr;
use App\Models\Transaction;
use App\Models\TransactionItem;
use App\Models\GroceryItem;
use Carbon\Carbon;
use League\Csv\Writer;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->input('dateReport') ? Carbon::parse($request->input('dateReport'))->format('Y-m-d') : Carbon::now()->format('Y-m-d');

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


        // Get two weeks worth of data to calculate moving average over a week
        $twoWeeksBefore = $startDate->copy()->subDays(13);

        // Apply to Category A
        foreach ($frequency as $item => $units) {
            $groceryItem = GroceryItem::where('ProductName', $item)->first();
            // dd($groceryItem->ProductName);

            // Calculate moving average using transactions over two weeks for item
            for ($i = 0; $i < 7; $i++) {
                // Start calculation a week prior
                $date = $startDate->copy()->subDays(6 - $i);

                $sum = TransactionItem::where('GroceryID', $groceryItem->GroceryID)
                    ->whereHas('transaction', function ($query) use ($date) {
                        $query->whereBetween('date', [$date->copy()->subDays(6), $date]); // Select the previous 7 days yet again including the current day
                    })->sum('quantity');

                $average = $sum / 7; // Calculate average over the 7 days

                $movingAverages[$date->toDateString()] = $average;
            }


            // Get trending direction

            // Get first average and current average, get difference
            $changeInY = abs($movingAverages[$startDate->copy()->subDays(6)->toDateString()] - $movingAverages[$startDate->toDateString()]);

            // Calculate gradient (slope)
            $gradient = $changeInY / 7;

            // Combine value of current day with trending direction to get weighting
            $weighting = $movingAverages[$startDate->toDateString()] + $gradient;

            $frequency[$item] *= $weighting;
        }

        arsort($frequency);
        $min = reset($frequency);
        $max = end($frequency);

        // 1 = high ranking, 0 = low ranking
        // 1 = high ranking, 0 = low ranking
        foreach ($frequency as $item => $weightedUnits) {
            if ($max - $min != 0) { //Avoiding divide by zero
                $frequency[$item] = round(1 - ($weightedUnits - $min) / ($max - $min), 2);
            } else {
                $frequency[$item] = 1;
            }
        }

        $a = array_slice($frequency, 0, $boundary);
        $c = array_slice($frequency, -$boundary);
        $b = array_slice($frequency, count($a), count($frequency) - count($a) - count($c));

        //Most Purchased Products
        $mostPurchasedItems = TransactionItem::with('groceryItem')
            ->selectRaw('GroceryID, SUM(quantity) as sum')
            ->groupBy('GroceryID')
            ->orderBy('sum', 'desc')
            ->take(5)
            ->get();

        $stockLevels = GroceryItem::select('ProductName', 'Stock')
            ->orderBy('Stock', 'asc')
            ->take(5)  // lowest 3 stock levels
            ->get();

        //Resetting Date
        $date = $request->input('dateReport') ? Carbon::parse($request->input('dateReport'))->format('Y-m-d') : Carbon::now()->format('Y-m-d');

        return view('reports.index', compact(
            'totalTransactions',
            'newMembers',
            'a',
            'b',
            'c',
            'memberCount',
            'totalGroceryItems',
            'totalSales',
            'date',
            'mostPurchasedItems',
            'stockLevels'
        ));
    }

    public function show() {

    }

    public function getCSV(Request $request) {
        $date = $request->input('dateReport') ? Carbon::parse($request->input('dateReport'))->format('Y-m-d') : Carbon::now()->format('Y-m-d');
        $startDate = Carbon::parse($date)->startOfDay();
        $endDate = Carbon::parse($date)->endOfDay();

        $totalSales = Transaction::whereBetween('Date', [$startDate, $endDate])->sum('TotalAmount');
        $totalTransactions = Transaction::whereBetween('Date', [$startDate, $endDate])->count();
        $newMembers = Member::whereBetween('created_at', [$startDate, $endDate])->count();

        //Most Purchased Products
        $mostPurchasedItems = TransactionItem::with('groceryItem')
            ->selectRaw('GroceryID, SUM(quantity) as sum')
            ->groupBy('GroceryID')
            ->orderBy('sum', 'desc')
            ->take(5)
            ->get();

        $stockLevels = GroceryItem::select('ProductName', 'Stock')
            ->orderBy('Stock', 'asc')
            ->take(5)  // lowest 3 stock levels
            ->get();

        $filename = 'gotogro_report_' . $date . '.csv';
        $filepath = storage_path('app\\public\\csv\\' . $filename);

        
        try {
            $csv = Writer::createFromPath($filepath, 'w+');

            $data = array([$date,'','','']);

            $dailyStats = array(
                ['Sales','Number of Transactions','New Members',''],
                [$totalSales,$totalTransactions,$newMembers,'']
            );

            $csvTrendingProducts = [];
            foreach ($mostPurchasedItems as $item) {
                $trendingProducts[] = [
                    $item->groceryItem->ProductName,
                    $item->sum,
                    '',
                    '',
                ];
            }

            $trendingProducts = [];

            $merge = array_merge($data, $dailyStats, $csvTrendingProducts);

            $data = [
                [$date,'','',''],
                ['Sales','Number of Transactions','New Members',''],
                ['$32.00','8','1',''],
                ['Trending Products Today','','',''],
                ['ProductID','ProductName','UnitsSold',''],
                ['1','Grapes','6',''],
                ['Stock Levels','','',''],
                ['ProductID','ProductName','Stock','Level'],
                ['2','Coconut','10','Medium'],
                ['Product Demand Analytics','','',''],
                ['Demand','ProductID','ProductName','Score'],
                ['High','1','Grapes','1'],
                ['Medium','1','Grapes','1'],
                ['Low','1','Grapes','1'],
            ];

            

            $csv->insertAll($merge);

            // Log a message or data
            \Log::info('CSV file path: ' . $filepath);

            return response()->json(['message' => $filepath], 200);


            // ->json(['message' => 'CSV file generated successfully']);

        } catch (\Exception $e) {
            \Log::error($e);
            return response()->json(['error' => 'Failed to generate CSV file'], 500);
        }

    }
}
