@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="Header">Edit Member</h1>

        <form action="{{ route('members.update', $member->MemberID) }}" method="POST" class="form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="FirstName">First Name</label>
                <input type="text" name="FirstName" id="FirstName" class="form-control {{ $errors->has('FirstName') ? 'is-invalid' : '' }}" value="{{ $member->FirstName }}" novalidate>
                @error('FirstName')
                    <span id="first_name_error" class ="error_message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="LastName">Last Name</label>
                <input type="text" name="LastName" id="LastName" class="form-control {{ $errors->has('LastName') ? 'is-invalid' : '' }}" value="{{ $member->LastName }}" novalidate>
                @error('LastName')
                    <span id="last_name_error" class ="error_message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="MemberStatusID">Member Status</label>
                <select name="MemberStatusID" id="MemberStatusID" class="form-control {{ $errors->has('MemberStatusID') ? 'is-invalid' : '' }}" novalidate>
                    @foreach ($memberStatuses as $status)
                        <option value="{{ $status->MemberStatusID }}"
                            {{ $status->MemberStatusID == $member->MemberStatusID ? 'selected' : '' }}>
                            {{ $status->MemberStatus }}</option>
                    @endforeach
                </select>
                @error('MemberStatusID')
                    <span id="member_statusID_error" class ="error_message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="DateOfBirth">Date of Birth</label>
                <input type="date" name="DateOfBirth" id="DateOfBirth" class="form-control {{ $errors->has('DateOfBirth') ? 'is-invalid' : '' }}" value="{{ $member->DateOfBirth->format('Y-m-d') }}" novalidate>
                @error('DateofBirth')
                    <span id="date_of_birth_error" class ="error_message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="GenderID">Gender</label>
                <select name="GenderID" id="GenderID" class="form-control {{ $errors->has('GenderID') ? 'is-invalid' : '' }}" novalidate>
                    @foreach ($genders as $gender)
                        <option value="{{ $gender->GenderID }}"
                            {{ $gender->GenderID == $member->GenderID ? 'selected' : '' }}>{{ $gender->gender_name }}
                        </option>
                    @endforeach
                </select>
                @error('GenderID')
                    <span id="genderID_error" class ="error_message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="Address">Address</label>
                <input type="text" name="Address" id="Address" class="form-control {{ $errors->has('Address') ? 'is-invalid' : '' }}" value="{{ $member->Address }}" novalidate>
                @error('Address')
                    <span id="address_error" class ="error_message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="Phone">Phone</label>
                <input type="tel" name="Phone" id="Phone" class="form-control {{ $errors->has('Phone') ? 'is-invalid' : '' }}" value="{{ $member->Phone }}" novalidate>
                @error('Phone')
                    <span id="phone_error" class ="error_message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" name="Email" id="Email" class="form-control {{ $errors->has('Email') ? 'is-invalid' : '' }}" value="{{ $member->Email }}" novalidate>
                @error('Email')
                    <span id="email_error" class ="error_message">{{ $message }}</span>
                @enderror
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
