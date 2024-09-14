<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            max-width: 700px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        label>span {
            display: inline-block;
            width: 150px;
            text-align: right;
            margin-right: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        textarea,
        select {
            width: 80%;
            height: 35px;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="file"] {
            margin-bottom: 15px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #3e8e41;
        }

        div {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    @if ($errors->any())
    <div class="error">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <h1>Admission Form</h1>

    <!-- Applicant Type -->
    <div>
        <label for="applicant_type">Applicant Type:</label>
        <select name="applicant_type" id="applicant_type" required>
            <option value="">Select Type</option>
            <option value="student">Student</option>
            <option value="staff">Staff</option>
        </select>
    </div>

    <!-- Dynamic form fields -->

    <div id="formfield"></div>



    <script>
        document.getElementById('applicant_type').addEventListener('change', function() {
            let value = this.value;
            let formField = document.getElementById("formfield");

            // Define the student form as a string
            let studentForm = `
        <form id="dynamicForm" action="{{ route('student.apply') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Name -->
    <div>
        <label for="name">Full Name:</label>
        <input type="text" name="name" id="name" required>
    </div>

    <!-- Date of Birth -->
    <div>
        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" id="dob" required>
    </div>

    <!-- Gender -->
    <div>
        <label for="gender">Gender:</label>
        <select name="gender" id="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
    </div>

    <!-- Email -->
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
    </div>

    <!-- Phone Number -->
    <div>
        <label for="phone_no">Phone Number:</label>
        <input type="text" name="phone_no" id="phone_no" required>
    </div>

    <!-- Address -->
    <div>
        <label for="address">Address:</label>
        <textarea name="address" id="address" required></textarea>
    </div>

    <!-- Department -->
    <div>
        <label for="department">Department:</label>
        <select name="department" id="department">
            <option value="Computer">Computer</option>
            <option value="Mechanical">Mechanical</option>
            <option value="Electrical">Electrical</option>
            <option value="Electronics">Electronics</option>
            <option value="Civil">Civil</option>
        </select>
    </div>

    <!-- Previous Education -->
    <div>
        <label for="previous_education">Previous Education:</label>
        <input type="text" name="previous_education" id="previous_education">
    </div>
       
    <!-- Previous Education -->
    <div>
        <label for="previous_education">Applicant_type:</label>
        <input type="text" name="applicant_type" value="student" id="previous_education" readonly>
    </div>

    <!-- Marks -->
    <div>
        <label for="marks">Marks (in %):</label>
        <input type="number" step="0.01" name="marks" id="marks">
    </div>

    <!-- Graduation Year -->
    <div>
        <label for="graduation_year">Graduation Year:</label>
        <input type="number" name="graduation_year" id="graduation_year">
    </div>

    <!-- Upload Certificate -->
    <div>
        <label for="certificate">Upload Certificate:</label>
        <input type="file" name="certificate" id="certificate">
    </div>

    <!-- Upload Transfer Certificate -->
    <div>
        <label for="tc">Upload Transfer Certificate (TC):</label>
        <input type="file" name="tc" id="tc">
    </div>

    <!-- Upload Conduct Certificate -->
    <div>
        <label for="cc">Upload Conduct Certificate (CC):</label>
        <input type="file" name="cc" id="cc">
    </div>

    <!-- Upload Marksheet -->
    <div>
        <label for="marksheet">Upload Marksheet:</label>
        <input type="file" name="marksheet" id="marksheet">
    </div>

    <!-- Submit Button -->
    <button type="submit">Submit Application</button>
</form>

        `;

            // Define the staff form as a string
            let staffForm = `
        <form id="dynamicForm" action="{{ route('staff.apply') }}" method="POST" enctype="multipart/form-data">
             @csrf
            <div>
                <label for="name">Full Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="dob">Date of Birth:</label>
                <input type="date" name="dob" id="dob" required>
            </div>
            <div>
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div>
                <label for="contact">Contact Number:</label>
                <input type="text" name="phone_no" id="contact" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div>
                <label for="address">Address:</label>
                <textarea name="address" id="address" required></textarea>
            </div>
            <div>
                <label for="department">Department:</label>
                <select name="department" id="department" required>
                    <option value="Computer">Computer</option>
                    <option value="Mechanical">Mechanical</option>
                    <option value="Electrical">Electrical</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Civil">Civil</option>
                </select>
            </div>
            <div>
                <label for="subject">Subject to Teach:</label>
                <input type="text" name="subject" id="subject" required>
            </div>
            <div>
                <label for="experience">Experience (in years):</label>
                <input type="number" name="experience" id="experience" required>
            </div>
            <div>
                <label for="resume">Upload Resume:</label>
                <input type="file" name="resume" id="resume" required>
            </div>
            <button type="submit">Submit Application</button>
            </form>
        `;

            // Display the appropriate form based on applicant type
            if (value === 'student') {
                formField.innerHTML = studentForm; // Display student form
            } else if (value === 'staff') {
                formField.innerHTML = staffForm; // Display staff form
            } else {
                formField.innerHTML = ''; // Clear all forms
            }
        });
    </script>

</body>

</html>