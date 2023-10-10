@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="Header">Add Member</h1>

        <form action="{{ route('members.store') }}" method="POST" class="form">
            @csrf

            <div class="form-group">
                <label for="FirstName">First Name</label>
                <input type="text" name="FirstName" id="FirstName" class="form-control" required>
                <span id="first_name_error" class ="error_message"></span>
            </div>

            <div class="form-group">
                <label for="LastName">Last Name</label>
                <input type="text" name="LastName" id="LastName" class="form-control" required>
                <span id="last_name_error" class ="error_message"></span>
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
                <span id="date_error" class ="error_message"></span>
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
                <span id="address_error" class ="error_message"></span>
            </div>

            <div class="form-group">
                <label for="Phone">Phone</label>
                <input type="tel" name="Phone" id="Phone" class="form-control" required>
                <span id="phone_error" class ="error_message"></span>
            </div>

            <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" name="Email" id="Email" class="form-control" required>
                <span id="email_error" class ="error_message"></span>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>


    <script>

        //for the display of validation errors
        function errorMsg(errors){ 
            Object.keys(errors).forEach(fieldName =>{
                const errorContainer = document.getElementById(`${fieldName}_error`);
                if(errorContainer){
                    errorContainer.innerText = errors[fieldName][0];
                }
            });
        }

        document.getElementById('memberForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(event.target);
            //access controller
            // ignore the error here. page still works
            fetch('{{ route('members.store') }}', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.errors) {
                    // Display errors next to form fields
                    errorMsg(data.errors);
                } else {
                    // Handle success (redirect, show success message, etc.)
                    alert(data.message);
                    // access controller
                    // ignore the error here. page still works
                    window.location.href = '{{ route('members.index') }}';
                }
            })
            .catch(error => {
                // Handle other errors
                console.error('Error:', error);
            });
        });
    </script>
@endsection
