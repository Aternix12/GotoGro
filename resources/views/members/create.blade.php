@extends('layouts.app')

<!-- 
Page is working... cannot for the life of me link stylesheet without using "app.blade.php", same issue i]with 'mylk.png'. 
Think I am stupid? 
Currently have tweaked with app.blade to allow this page to be formatted using my own css.. 
Will fix later, when i get more time -->
@section('content')
    <nav class="header">
        <h1 class="Title">Add Member</h1>
    </nav>
    <div class="content">
        <div class="LeftGrid">
            <div class="LGwrapper">
                <a href="" id="Mylk"
                    ><img src="/resources/css/img/mylk.png" alt="Mylk"
                /></a>
            </div>
        </div>
        <div class="MiddleGrid addMember">
            <div class="MiddleGridContent">
                <div class="container">
                    <h1>Add Member</h1>

                    <form
                        action="{{ route('members.store') }}"
                        method="POST"
                    >
                        @csrf

                        <div class="form-group">
                            <label class="formPrompt" for="FirstName"
                                >First Name</label
                            >
                            <input
                                type="text"
                                name="FirstName"
                                id="FirstName"
                                class="form-control"
                                required
                            />
                        </div>

                        <div class="form-group">
                            <label class="formPrompt" for="LastName"
                                >Last Name</label
                            >
                            <input
                                type="text"
                                name="LastName"
                                id="LastName"
                                class="form-control"
                                required
                            />
                        </div>

                        <div class="form-group">
                            <label class="formPrompt" for="MemberStatusID"
                                >Member Status</label
                            >
                            <select
                                name="MemberStatusID"
                                id="MemberStatusID"
                                class="form-control"
                                required
                            >
                                @foreach ($memberStatuses as $status)
                                <option
                                    value="{{ $status->MemberStatusID }}"
                                >
                                    {{ $status->MemberStatus }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="formPrompt" for="DateOfBirth"
                                >Date of Birth</label
                            >
                            <input
                                type="date"
                                name="DateOfBirth"
                                id="DateOfBirth"
                                class="form-control"
                                required
                            />
                        </div>

                        <div class="form-group">
                            <label class="formPrompt" for="GenderID"
                                >Gender</label
                            >
                            <select
                                name="GenderID"
                                id="GenderID"
                                class="form-control"
                                required
                            >
                                @foreach ($genders as $gender)
                                <option value="{{ $gender->GenderID }}">
                                    {{ $gender->gender_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="formPrompt" for="Address"
                                >Address</label
                            >
                            <input
                                type="text"
                                name="Address"
                                id="Address"
                                class="form-control"
                                required
                            />
                        </div>

                        <div class="form-group">
                            <label class="formPrompt" for="Phone"
                                >Phone</label
                            >
                            <input
                                type="tel"
                                name="Phone"
                                id="Phone"
                                class="form-control"
                                required
                            />
                        </div>

                        <div class="form-group">
                            <label class="formPrompt" for="Email"
                                >Email</label
                            >
                            <input
                                type="email"
                                name="Email"
                                id="Email"
                                class="form-control"
                                required
                            />
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Add Member
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection




