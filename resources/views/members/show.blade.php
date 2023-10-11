@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="Header">Edit Member</h1>

        <form action="{{ route('members.update', $member->MemberID) }}" method="POST" class="form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="FirstName">First Name</label>
                <input type="text" name="FirstName" id="FirstName" class="form-control" value="{{ $member->FirstName }}"
                    required>
                <span id="first_name_error" class="error_message"></span>
            </div>

            <div class="form-group">
                <label for="LastName">Last Name</label>
                <input type="text" name="LastName" id="LastName" class="form-control" value="{{ $member->LastName }}"
                    required>
                <span id="last_name_error" class="error_message"></span>
            </div>

            <div class="form-group">
                <label for="MemberStatusID">Member Status</label>
                <select name="MemberStatusID" id="MemberStatusID" class="form-control" required>
                    @foreach ($memberStatuses as $status)
                        <option value="{{ $status->MemberStatusID }}"
                            {{ $status->MemberStatusID == $member->MemberStatusID ? 'selected' : '' }}>
                            {{ $status->MemberStatus }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="DateOfBirth">Date of Birth</label>
                <input type="date" name="DateOfBirth" id="DateOfBirth" class="form-control"
                    value="{{ $member->DateOfBirth->format('Y-m-d') }}" required>
                <span id="date_error" class="error_message"></span>
            </div>

            <div class="form-group">
                <label for="GenderID">Gender</label>
                <select name="GenderID" id="GenderID" class="form-control" required>
                    @foreach ($genders as $gender)
                        <option value="{{ $gender->GenderID }}"
                            {{ $gender->GenderID == $member->GenderID ? 'selected' : '' }}>{{ $gender->gender_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="Address">Address</label>
                <input type="text" name="Address" id="Address" class="form-control" value="{{ $member->Address }}"
                    required>
                <span id="adress_error" class="error_message"></span>
            </div>

            <div class="form-group">
                <label for="Phone">Phone</label>
                <input type="tel" name="Phone" id="Phone" class="form-control" value="{{ $member->Phone }}"
                    required>
                <span id="phone_error" class="error_message"></span>
            </div>

            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" name="Email" id="Email" class="form-control" value="{{ $member->Email }}"
                    required>
                <span id="email_error" class="error_message"></span>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
        <div style="height: 50px;"></div>
        <h1 class="Header">Transactions</h1>
        @foreach ($transactions as $transaction)
            <div class="member-transaction-container">
                <a href="{{ route('transactions.show', $transaction->id) }}"
                    class="btn btn-primary rounded-pill member-transaction">
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
