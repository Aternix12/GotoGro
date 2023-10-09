@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sales Records for {{ $recordDate }}</h1>
        @foreach ($transactions as $transaction)
            <div class="member-transaction-container">
                <a href="{{ route('transactions.show', $transaction->id) }}"
                    class="btn btn-primary rounded-pill member-transaction">
                    <span>
                        <div>{{ $transaction->Date }}</div>
                        <div><b>{{ $transaction->memberID->FirstName }} {{ $transaction->memberID->LastName }}</b></div>
                        <div>{{ $transaction->transactionItems->count() }} Items</div>
                        <div>
                            <span class="{{ $transaction->OrderStatusID == 1 ? 'status-active' : 'status-inactive' }}">
                                {{ $transaction->orderStatusID->OrderStatus ?? 'N/A' }}
                            </span>
                        </div>
                        <div><b>{{ number_format($transaction->TotalAmount, 2) }}</b></div>
                    </span>
                </a>
            </div>
        @endforeach
    </div>
@endsection
