@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sales Records</h1>
        @foreach ($salesRecords as $record)
            <div class="member-transaction-container">
                <a href="{{ route('sales.show', $record['date']) }}" class="btn btn-primary rounded-pill member-transaction">
                    <span>
                        <div><b>{{ $record['date'] }}</b></div>
                        <div>{{ $record['totalTransactions'] }} Transactions</div>
                        <div><b>{{ number_format($record['totalAmount'], 2) }}</b></div>
                    </span>
                </a>
            </div>
        @endforeach
    </div>
@endsection
