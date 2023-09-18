@extends('layouts.app')

@section('content')
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="Dale Bent" />
        <meta name="keywords" content="HTML5, tags, CSS" />
        <link rel="stylesheet" href="/resources/css/app.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap"
            rel="stylesheet"
        />
        <title>Add Member Page</title>
    </head>
    <body>
        <nav class="header">
            <h1 class="Title">Add Member</h1>
        </nav>
        <div class="content">
            <div class="LeftGrid">
                <div class="LGwrapper">
                    <a href="mylk.com" id="Mylk"
                        ><img src="/App/Webpages/img/mylk.png" alt="Mylk"
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
    </body>
</html>

@endsection
