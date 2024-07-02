<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xQQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>{{ $title }}</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 20px;
        }
        .text-center {
            text-align: center;
        }
        .rounded-circle {
            border-radius: 50%;
        }
        .img-fluid {
            max-width: 100%;
            height: auto;
        }
        .my-3 {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }
        .text-muted {
            color: #6c757d !important;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }
        .col {
            flex: 1;
            padding-right: 15px;
            padding-left: 15px;
        }
        .title {
            font-size: 1.5rem;
            font-weight: 700;
        }
        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="card">
        @php
            $imagePath = public_path('paper/img/dummy-image.png');
            $imageData = base64_encode(file_get_contents($imagePath));
            $imageSrc = 'data:image/png;base64,' . $imageData;
        @endphp
        <div class="text-center">
            <img src="{{ $imageSrc }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
            <h3 class="my-3">{{ $parent['name'] }}</h3>
            <p class="text-muted">Contact: {{ $parent['contact'] }}</p>
        </div>
    </div>

    <div class="card">
        <h5 class="title">Parent Information</h5>
        <table class="table">
            <tbody>
              <tr>
                <td><strong>Parent Name</strong></td>
                <td>{{ $parent['name'] }}</td>
              </tr>
              <tr>
                <td><strong>Parent Email</strong></td>
                <td>{{ $parent['email'] }}</td>
              </tr>
              <tr>
                <td><strong>Parent Profession</strong></td>
                <td>{{ $parent['profession'] }}</td>
              </tr>
              <tr>
                <td><strong>Contact Number</strong></td>
                <td>{{ $parent['contact'] }}</td>
              </tr>
              <tr>
                <td><strong>User Name</strong></td>
                <td>{{ $parent['username'] }}</td>
              </tr>
              <tr>
                <td><strong>Password</strong></td>
                <td>{{ $parent['password'] }}</td>
              </tr>
            </tbody>
          </table>
    </div>

    <div class="card">
        <h5 class="title">Student Information</h5>
        <table class="table">
            <tbody>
              <tr>
                <td><strong>Full Name</strong></td>
                <td>{{ $student['name'] }}</td>
              </tr>
              <tr>
                <td><strong>Gender</strong></td>
                <td>{{ $student['gender'] }}</td>
              </tr>
              <tr>
                <td><strong>Admission For</strong></td>
                <td>{{ $student['admission_for'] }}</td>
              </tr>
              <tr>
                <td><strong>Date Of Birth</strong></td>
                <td>{{ $student['dob'] }}</td>
              </tr>
              <tr>
                <td><strong>Blood Group</strong></td>
                <td>{{ $student['blood_group'] }}</td>
              </tr>
              <tr>
                <td><strong>Religion</strong></td>
                <td>{{ $student['religion'] }}</td>
              </tr>
              <tr>
                <td><strong>Category</strong></td>
                <td>{{ $student['category'] }}</td>
              </tr>
              <tr>
                <td><strong>Language</strong></td>
                <td>{{ $student['language'] }}</td>
              </tr>
              <tr>
                <td><strong>Previous School</strong></td>
                <td>{{ $student['previous_school'] }}</td>
              </tr>
              <tr>
                <td><strong>Address</strong></td>
                <td>{{ $student['address'] }}</td>
              </tr>
              <tr>
                <td><strong>Country</strong></td>
                <td>{{ $student['country'] }}</td>
              </tr>
              <tr>
                <td><strong>State</strong></td>
                <td>{{ $student['state'] }}</td>
              </tr>
              <tr>
                <td><strong>City</strong></td>
                <td>{{ $student['city'] }}</td>
              </tr>
              <tr>
                <td><strong>Pin Code</strong></td>
                <td>{{ $student['pin_code'] }}</td>
              </tr>
            </tbody>
          </table>
    </div>
</body>
</html>
