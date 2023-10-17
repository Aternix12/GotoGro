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
                <h4>Today's Trending Products</h4>
                <div class="left-Grid">
                    @foreach ($mostPurchasedItems as $item)
                        <div class="productItem">
                            <p class="items">{{ $item->groceryItem->ProductName }} ({{ $item->sum }})</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="reportData2">
                <h4>Stock Levels</h4>
                <div class="center-Grid">
                    @foreach ($stockLevels as $item)
                        <div class="productItem">
                            <p class="items">{{ $item->ProductName }} ({{ $item->Stock }})</p>
                            @if ($item->Stock < 10)
                                <img src="{{ asset('img/red.png') }}" alt="red" class="red">
                            @elseif($item->Stock < 50)
                                <img src="{{ asset('img/yellow.png') }}" alt="yellow" class="yellow">
                            @else
                                <img src="{{ asset('img/green.png') }}" alt="green" class="green">
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Trending Products Grid -->
        <hr>
        <h3>Product Demand Analytics</h3>
        <p>Analytics are derived from the ABC method using units sold combined with the simple moving average of units sold
            over the past week with the trend gradient applied as a weighting on the ABC ranking for all grocery items.</p>
        <ul>
            <li>Info on the ABC method and other inventory analysis and forecasting methods can be found <a
                    href="https://www.netsuite.com/portal/resource/articles/inventory-management/retail-inventory-management.shtml">here</a>.
            </li>
            <li>
                The moving average takes into account the previous week's worth of units sold for a grocery item which is
                applied to 7 days preceding the selected report date.
                Details on the moving average can be found <a
                    href="https://www.investopedia.com/terms/m/movingaverage.asp">here</a>.
            </li>
        </ul>

        <h4>How to read the data</h4>

        <ul>
            <li><strong style="color: red;">High</strong> - Indicates that these products are in high demand and should be
                cross checked with stock levels to plan restocking accordingly.</li>
            <li><strong style="color: rgb(177, 177, 52);">Medium</strong> - Indicates that these products are neither high,
                nor low in demand and restocking for these should be evaluated on a case by case basis.</li>
            <li><strong style="color: green;">Low</strong> - Indicates that these products are low in demand and restocking
                is not a priority.</li>
        </ul>

        <div class="trendingGrid">


            <div class="left-Grid">

                <!-- High Status -->
                <h3 class="status red">High</h3>
                @foreach ($a as $item => $quantity)
                    <div class="productItem">
                        <p class="items">{{ $item }} ({{ $quantity }})</p>
                    </div>
                @endforeach
            </div>
            <div class="center-Grid">

                <!-- Med Status -->
                <h3 class="status yellow">Med</h3>
                @foreach ($b as $item => $quantity)
                    <div class="productItem">
                        <p class="items">{{ $item }} ({{ $quantity }})</p>
                    </div>
                @endforeach
            </div>
            <div class="right-Grid">
                <!-- Low Status -->
                <h3 class="status green">Low</h3>
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

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Show items by selected category
            $('#gen-button').click(function () {

                var selectedDate = $('#dateReport').val();

                $.ajax({
                    type: 'GET',
                    url: '/getCSV',
                    data: { dateReport: selectedDate },
                    success: function (response) {
                        // Log the entire response for inspection
                    console.log(response);

                    // Check if 'message' property exists in the response
                    if (response.hasOwnProperty('message')) {
                        console.log(response.message); // Access the 'message' property
                    } else {
                        console.log('No "message" property found in the response.');
                    }
                                            
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>



@endsection