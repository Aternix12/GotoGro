@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sales Records</h1>
        @foreach ($transactions as $transaction)
            <div class="member-transaction-container">
                <a href="#" class="btn btn-primary rounded-pill member-transaction">
                    <span>
                        <div><b>{{ $transaction->Date }}</b></div>
                        <div>{{ $transaction->transactionItems->count() }} Items</div>
                        <div>
                            <span class="{{ $transaction->OrderStatusID == 1 ? 'status-active' : 'status-inactive' }}">
                                {{ $transaction->orderSatusID->OrderStatus ?? 'N/A' }}
                            </span>
                        </div>
                        <div><b>{{ number_format($transaction->TotalAmount, 2) }}</b></div>
                    </span>
                </a>
            </div>
        @endforeach
    </div>
@endsection
