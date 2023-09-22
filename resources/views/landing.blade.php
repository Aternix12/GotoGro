@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="LandingHeader">GotoGro - MRM</h1>
        <div class="grid-container">
            <a href="{{ route('sales.index') }}" class="grid-item">
                <div>Sales</div>
            </a>
            <a href="{{ route('items.index') }}" class="grid-item">
                <div>Products</div>
            </a>
            <a href="{{ route('members.index') }}" class="grid-item">
                <div>Members</div>
            </a>
            <a href="{{ route('reports.index') }}" class="grid-item">
                <div>Reports</div>
            </a>
        </div>
    </div>
@endsection
