@extends('layouts.app')

@section('content')
    <div class="space-div2"></div>
    <div class="container-gen">
        <div class="header-wrapper">
        <h1 class="gen-report">Generate report</h1>
        <form action="">
            <input type="date" id = "date">
        </form>
        </div>
        <div class="space-div"></div>
        <h2 id= "gen-head">Included details:</h2>
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

    </div>
    <button id="gen-button">
            Generate
        </button>
@endsection
