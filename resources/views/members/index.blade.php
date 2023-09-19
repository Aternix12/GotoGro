@extends('layouts.app')

@section('content')
<head class="header">
            <h1 class="Title">View Member</h1>
        </head>
        
            <div class="content">
                <div class="LeftGrid">
                    <a href="mylk.com"><img src="mylk.png" alt="Mylk" /></a>
                </div>
                <div class="MiddleGrid">
                    <div class="MidUp">
                        <p class="MemberName">Member Name</p>
                    </div>
                    <div class="MidMid">
                        <h2 class="">Details</h2>
                        <form action="" class="Form" id="DetailsForm">
                            <label for="Phone">Phone:</label><br />
                            <input type="text" name="Phone" id="Phone" /><br />
                            <label for="Email">Email:</label><br />
                            <input type="text" name="Email" id="Email" /><br />
                            <label for="Adress">Adress</label><br />
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
        
@endsection
