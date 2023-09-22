@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="Header">Add Member</h1>

        <form action="{{ route('members.store') }}" method="POST" class="form">
            @csrf

            <div class="form-group">
                <label for="FirstName">First Name</label>
                <input type="text" name="FirstName" id="FirstName" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="LastName">Last Name</label>
                <input type="text" name="LastName" id="LastName" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="MemberStatusID">Member Status</label>
                <select name="MemberStatusID" id="MemberStatusID" class="form-control" required>
                    @foreach ($memberStatuses as $status)
                        <option value="{{ $status->MemberStatusID }}">{{ $status->MemberStatus }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="DateOfBirth">Date of Birth</label>
                <input type="date" name="DateOfBirth" id="DateOfBirth" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="GenderID">Gender</label>
                <select name="GenderID" id="GenderID" class="form-control" required>
                    @foreach ($genders as $gender)
                        <option value="{{ $gender->GenderID }}">{{ $gender->gender_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="Address">Address</label>
                <input type="text" name="Address" id="Address" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Phone">Phone</label>
                <input type="tel" name="Phone" id="Phone" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" name="Email" id="Email" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
