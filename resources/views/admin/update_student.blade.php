<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Dashboard | Update Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .dashboard-header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .btn-save {
            background-color: #28a745;
            color: white;
        }

        .btn-save:hover {
            background-color: #218838;
        }

        .btn-reset {
            background-color: #dc3545;
            color: white;
        }

        .btn-reset:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body class="bg-light">

    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <h1>Student Dashboard</h1>
        <p>Update Your Information</p>
    </div>

    <!-- Update Student Form -->
    <div class="container d-flex justify-content-center my-5">
        <div class="w-75">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="text-center">Update Student Form</h3>
                    <br>
                    <form action="{{ url('save_student_update') }}/{{$student->id}}" method="post">
                        @csrf
                        <!-- Name -->
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{$student->name}}" required>
                            </div>
                        </div>
                        <!-- Date of Birth -->
                        <div class="row mb-3">
                            <label for="dob" class="col-sm-2 col-form-label">DOB:</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="dob" name="dob" value="{{$student->dob}}" required>
                            </div>
                        </div>
                        <!-- Contact -->
                        <div class="row mb-3">
                            <label for="contact" class="col-sm-2 col-form-label">Contact:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="contact" name="contact" value="{{$student->contact}}" required>
                            </div>
                        </div>
                        <!-- Parent Contact -->
                        <div class="row mb-3">
                            <label for="parent_contact" class="col-sm-2 col-form-label">Parent Contact:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="parent_contact" name="parent_contact" value="{{$student->parent_contact}}" required>
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" value="{{$student->email}}" required>
                            </div>
                        </div>
                        <!-- Course Selection -->
                        <div class="row mb-3">
                            <label for="course" class="col-sm-2 col-form-label">Course:</label>
                            <div class="col-sm-10">
                                <select class="form-select" id="course" name="course" required>
                                    <option value="{{$student->course_name}}">{{$student->course_name}}</option>
                                    @foreach ($course as $c)
                                        <option value="{{$c->course_name}}">{{$c->course_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Password -->
                        <div class="row mb-3">
                            <label for="password" class="col-sm-2 col-form-label">Password:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Leave blank to keep current password">
                            </div>
                        </div>
                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-save">Save Changes</button>
                            <button type="reset" class="btn btn-reset">Reset Form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>