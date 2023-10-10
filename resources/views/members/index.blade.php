@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Members</h1>
        <a href="{{ route('members.create') }}" class="btn rounded-btn mb-3">Add Member</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                        <td>{{ $member->MemberID }}</td>
                        <td>{{ $member->FirstName }}</td>
                        <td>{{ $member->LastName }}</td>
                        <td>{{ $member->DateOfBirth }}</td>
                        <td>{{ $member->gender->gender_name ?? 'N/A' }}</td>
                        <td>{{ $member->Address }}</td>
                        <td>{{ $member->Phone }}</td>
                        <td>{{ $member->Email }}</td>
                        <td>
                            <span>
                                <a href="{{ route('members.show', $member->MemberID) }}" class="btn btn-success"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('members.destroy', $member->MemberID) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
