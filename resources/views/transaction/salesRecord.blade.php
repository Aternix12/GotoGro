@extends('layouts.app')

@section('content')
   <!-- <link rel="stylesheet" type="text/css" href="{{ asset('path-to-your-stylesheet.css') }}"> -->

    <div class="header">
        <h1 class="Title">Transaction History</h1>
    </div>
    <div class="content">
        <div class="LeftGrid">
            <div class="LGwrapper">
                <a href="" id="Mylk"
                    ><img src="/resources/css/img/mylk.png" alt="Mylk"
                /></a>
            </div>
        </div>
        <div class="MiddleGrid">
            <div class="MiddleGridContent">
                <div class="container">
                    <h1>Transaction History</h1>
                    <div class="transaction-list">
                        @foreach ($transactions as $transaction)
                            <div class="transaction-item">
                                <div class="date">{{ $transaction->date }}</div>
                                <div class="count">{{ $transaction->count }}</div>
                                <div class="total-amount">{{ $transaction->total_amount }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="RightGrid">
            <!-- Other content or widgets on the right side -->
        </div>
    </div>
@endsection
