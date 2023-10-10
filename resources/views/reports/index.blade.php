@extends('layouts.app')

@section('content')

{{--Need to add references to DB through these. Just dummy fillings atm --}}
    <div class="space-div2"></div>
    <div class="container-gen">
        <div class="header-wrapper">
        <h1 class="gen-report">Generate report</h1>
        <form action="">
            <input type="date" id = "dateReport">
        
        </div>
        <div class="space-div"></div>
        <a href="{{ route('members.index') }}" class= "report-blocks">
            <div class="form-group-gen" >
                <p class="internal-group">Members</p>
                <p class="internal-group">Date</p>
                <p class="internal-group">Created</p>
            </div>

        </a>
        <a href="{{ route('transactions.index') }}" class= "report-blocks">
            <div class="form-group-gen" >
                <p class="internal-group">Transaction</p>
                <p class="internal-group">Date</p>
                <p class="internal-group">Created</p>
            </div>

        </a>
        <a href="{{ route('items.index') }}" class= "report-blocks">
            <div class="form-group-gen" >
                <p class="internal-group">Items</p>
                <p class="internal-group">Date</p>
                <p class="internal-group">Created</p>
            </div>

        </a>
        <h2 class="GotoGro">Goto-Gro MRM</h2>
        <div class="reportSectionTopWrapper">
            <div class="reportSectionTop">
                <p class="reportData">
                    Filler
                </p>
                <p class="reportDataBottom">
                    Filler but longer
                </p>
            </div>

            <div class="reportSectionTop">
                <p class="reportData">
                    Filler
                </p>
                <p class="reportDataBottom">
                    Filler but longer
                </p>
            </div>

            <div class="reportSectionTop">
                <p class="reportData">
                    Filler
                </p>
                <p class="reportDataBottom">
                    Filler but longer
                </p>
            </div>
        </div>
        <div class="reportSectionLowerWrapper">
            <div class="reportData2">
                <p class="reportDataForecast">
                    Trending products filler 
                </p>
                <p class="reportDataForecast2">
                    Inventory forecast
                </p>
            </div>
            <div class="reportData2">
            <p class="reportDataForecast">
                    Trending products filler 
                </p>
                <p class="reportDataForecast2">
                    Inventory forecast
                </p>
            </div>
        </div>
        <div class="trendingProducts">  
            <h2 class="GotoGro">
                 Goto-Gro MRM
            </h2>
            <h2 id="gen-head" >
                Trending Products
            </h2>
        </div>
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
                <h3 class = "status yellow">Med</h3>
                <div class="productItem">
                <p class="items">Test</p>
                   
                    
                </div>
                <h3 class = "status green">High</h3>
                <div class="productItem">
                <p class="items">Test</p>
                    
                </div>
                <h3 class = "status red">Low</h3>
                <div class="productItem">

                <p class="items">Test</p>
                    
                </div>
            </div>
        </div>
        <div class="buttonDiv">
            <button id="gen-button">
                    Generate
            </button>
        </div>
    </div>
</div>
</form>


@endsection
