<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;

class SalesRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salesData = Transaction::all()
            ->groupBy(function ($date) {
                return Carbon::parse($date->Date)->format('Y-m-d');
            });


        $salesRecords = [];

        foreach ($salesData as $date => $transactions) {
            $totalAmount = $transactions->sum('TotalAmount');
            $salesRecords[] = [
                'date' => $date,
                'totalTransactions' => $transactions->count(),
                'totalAmount' => $totalAmount,
            ];
        }

        return view('sales.index', [
            'salesRecords' => $salesRecords,
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $date)
    {
        $transactions = Transaction::whereDate('Date', $date)->get();

        return view('sales.show', [
            'transactions' => $transactions,
            'recordDate' => $date
        ]);
    }
}
