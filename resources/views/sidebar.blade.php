<a href="/">
    <img src="{{ asset('img/mylk.png') }}" href="/" alt="Mylk Logo" class="img-full-width">
</a>
<nav class="vertical-menu">
    <a href="/">Home</a>
    <a href="{{ route('members.index') }}">Members</a>
    <a href="{{ route('members.create') }}">New Member</a>
    <a href="{{ route('items.index') }}">Grocery Items</a>
    <a href="{{ route('items.create') }}">New Grocery Item</a>
    <a href="{{ route('transactions.create') }}">New Transaction</a>
    <a href="{{ route('sales.index') }}">Sales</a>
    <a href="{{ route('reports.index') }}">Reports</a>
</nav>
<div class="github-icon">
    <a href="https://github.com/Aternix12/GotoGro" target="_blank">
        <img src="{{ asset('img/github.png') }}" alt="Github Logo" class="github-icon">
    </a>
</div>
