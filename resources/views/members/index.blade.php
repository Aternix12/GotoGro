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
        

