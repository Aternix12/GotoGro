@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Header and Date Picker -->
        <span>
            <h1>Reports</h1>
            <form action="{{ route('reports.index') }}" method="GET">
                <input type="date" name="dateReport" id="dateReport" value="{{ $date }}">
                <input type="submit" value="Filter">
            </form>
        </span>

        <!-- Sales, Transactions, and Members Summary -->
        <div class="reportSectionTopWrapper">
            <div class="reportSectionTop">
                <h4>Sales</h4>
                <p class="reportDataBottom">${{ number_format($totalSales, 2) }}</p>
            </div>
            <div class="reportSectionTop">
                <h4>Number of Transactions</h4>
                <p class="reportDataBottom">{{ $totalTransactions }}</p>
            </div>
            <div class="reportSectionTop">
                <h4>New Members</h4>
                <p class="reportDataBottom">{{ $newMembers }}</p>
            </div>
        </div>

        <!-- Additional Data -->
        <div class="reportSectionLowerWrapper">
            <div class="reportData2">
                <h4>Trending Products with Stock Levels</h4>
            </div>
            <div class="reportData2">
                <h4>Inventory Forecast</h4>
            </div>
        </div>

        <!-- Trending Products Grid -->
        <hr>
        <div class="trendingGrid">
            <div class="left-Grid">
                <div class="productItem">
                    <p class="items">Test</p>
                    <p class="items">Low</p>

                </div>
                <div class="productItem">
                    <p class="items">Test</p>
                    <p class="items">High</p>

                </div>
                <div class="productItem">
                    <p class="items">Test</p>
                    <p class="items">Low</p>

                </div>
            </div>
            <div class="center-Grid">
                <div class="productItem">
                    <p class="items">Test</p>
                    <img src="{{ asset('img/red.png') }}" alt="red" class="red">
                </div>
                <div class="productItem">
                    <p class="items">Test</p>
                    <img src="{{ asset('img/yellow.png') }}" alt="yellow" class="yellow">


                </div>
                <div class="productItem">
                    <p class="items">Test</p>
                    <img src="{{ asset('img/green.png') }}" alt="red" class="green">


                </div>
            </div>
            <div class="right-Grid">
                <!-- High Status -->
                <h3 class="status green">High</h3>
                @foreach ($a as $item => $quantity)
                    <div class="productItem">
                        <p class="items">{{ $item }} ({{ $quantity }})</p>
                    </div>
                @endforeach

                <!-- Med Status -->
                <h3 class="status yellow">Med</h3>
                @foreach ($b as $item => $quantity)
                    <div class="productItem">
                        <p class="items">{{ $item }} ({{ $quantity }})</p>
                    </div>
                @endforeach

                <!-- Low Status -->
                <h3 class="status red">Low</h3>
                @foreach ($c as $item => $quantity)
                    <div class="productItem">
                        <p class="items">{{ $item }} ({{ $quantity }})</p>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Generate Button -->
        <div class="buttonDiv">
            <button id="gen-button">Generate</button>
        </div>
    </div>
@endsection
