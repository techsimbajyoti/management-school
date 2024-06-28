<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Parent Information</title>
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
            <h5 class="my-3">Steve Smith</h5>
            <p class="text-muted">Contact: 1478523690</p>
        </div>
    </div>

    <div class="card">
        <h4 class="title">Parent Information</h4>
        <table class="table">
            <tbody>
              <tr>
                <td>Parent Name</td>
                <td>Thornton</td>
              </tr>
              <tr>
                <td>Parent Email</td>
                <td>Thornton@gmail.com</td>
              </tr>
              <tr>
                <td>Parent Profession</td>
                <td>theBird</td>
              </tr>
              <tr>
                <td>Contact Number</td>
                <td>789456123</td>
              </tr>
              <tr>
                <td>User Name</td>
                <td>UiIjk</td>
              </tr>
              <tr>
                <td>Password</td>
                <td>123456789</td>
              </tr>
            </tbody>
          </table>
    </div>

    <div class="card">
        <h4 class="title">Student Information</h4>
        <table class="table">
            <tbody>
              <tr>
                <td>Full Name</td>
                <td>Thornton Dev</td>
              </tr>
              <tr>
                <td>Gender</td>
                <td>Female</td>
              </tr>
              <tr>
                <td>Admission For</td>
                <td>One</td>
              </tr>
              <tr>
                <td>Date Of Birth</td>
                <td>00/00/0000</td>
              </tr>
              <tr>
                <td>Blood Group</td>
                <td>o+</td>
              </tr>
              <tr>
                <td>Religion</td>
                <td>Hindu</td>
              </tr>
              <tr>
                <td>Category</td>
                <td>OBC</td>
              </tr>
              <tr>
                <td>Language</td>
                <td>Hindi, English</td>
              </tr>
              <tr>
                <td>Previous School</td>
                <td>ABCD</td>
              </tr>
              <tr>
                <td>Addres</td>
                <td>ABCD</td>
              </tr>
              <tr>
                <td>Country</td>
                <td>ABCD</td>
              </tr>
              <tr>
                <td>State</td>
                <td>ABCD</td>
              </tr>
              <tr>
                <td>City</td>
                <td>ABCD</td>
              </tr>
              <tr>
                <td>Pin Code</td>
                <td>123456</td>
              </tr>
            </tbody>
          </table>
    </div>
</body>
</html>
