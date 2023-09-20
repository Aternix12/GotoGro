<<<<<<< HEAD
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap"
            rel="stylesheet"
        />
        <title>Member View Page</title>
    </head>
    <body> 
        <nav class="header">
                    <h1 class="Title">View Member</h1>
        </nav>
            <div class="content">
                <div class="LeftGrid">
                    <a href="mylk.com"><img src="mylk.png" alt="Mylk" /></a>
                </div>
                <div class="MiddleGrid">
                    <div class="MidUp">
                        <p class="MemberName">Member Name</p>
                    </div>
                    <!--Placeholder for form -->
                    <div class="MidMid">
                        <h2 class="">Details</h2>
                        <form action="" class="Form" id="DetailsForm">
                            <label for="Phone">Phone:</label><br />
                            <input type="text" name="Phone" id="Phone" /><br />
                            <label for="Email">Email:</label><br />
                            <input type="text" name="Email" id="Email" /><br />
                            <label for="Adress">Address</label><br />
                            <input type="text" name="Adress" id="Adress" />
                            <label for="Gender">Gender:</label><br />
                            <input type="text" name="Gender" id="Gender" />
                            <label for="Gender"></label><br />
                        </form>
                    </div>
                    <div class="MidLow">
                        <div class="TransBox">
                            <p class="TransBoxText">date</p>
                            <p class="TransBoxText">item count</p>
                            <p class="TransBoxText" id="OuterShell">status</p>
                            <p class="TransBoxText">total</p>
                        </div>
                        <div class="TransBox">
                            <p class="TransBoxText">date</p>
                            <p class="TransBoxText">item count</p>
                            <p class="TransBoxText" id="OuterShell">status</p>
                            <p class="TransBoxText">total</p>
                        </div>
                        <div class="TransBox">
                            <p class="TransBoxText">date</p>
                            <p class="TransBoxText">item count</p>
                            <p class="TransBoxText" id="OuterShell">status</p>
                            <p class="TransBoxText">total</p>
                        </div>
                    </div>
                </div>
                <div class="RightGrid">
                    <div class="favs">
                        <p class="FaveBoxText">Member</p>
                        <p class="FaveBoxText">Member</p>
                        <p class="FaveBoxText">Member</p>
                        <p class="FaveBoxText">Member</p>
                        <p class="FaveBoxText">Member</p>
                    </div>
                </div>
            </div>
         </body>
 </html>
        
=======
@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>All Members</h1>
>>>>>>> a866f66ace8b3270080003b82bde6526f91a0292

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
                            <a href="{{ route('members.show', $member->MemberID) }}" class="btn btn-success"><i
                                    class="fas fa-edit"></i></a>
                            <a href="{{ route('members.destroy', $member->MemberID) }}" class="btn btn-danger"><i
                                    class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
