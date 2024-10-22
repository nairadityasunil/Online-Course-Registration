<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Student Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>New Student Registration Form</h3>
                    </div>
                    <div class="card-body">

                        <!-- Error Messages -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Registration Form -->
                        <form action="{{ route('register_student') }}" method="POST">
                            @csrf

                            <!-- Name Field -->
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-2 col-form-label">Name:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter full name">
                                </div>
                            </div>

                            <!-- DOB Field -->
                            <div class="mb-3 row">
                                <label for="dob" class="col-sm-2 col-form-label">DOB:</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="dob" name="dob">
                                </div>
                            </div>

                            <!-- Contact Field -->
                            <div class="mb-3 row">
                                <label for="contact" class="col-sm-2 col-form-label">Contact:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter contact number">
                                </div>
                            </div>

                            <!-- Parent Contact Field -->
                            <div class="mb-3 row">
                                <label for="parent_contact" class="col-sm-2 col-form-label">Parent Contact:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="parent_contact" name="parent_contact" placeholder="Enter parent's contact number">
                                </div>
                            </div>

                            <!-- Email Field -->
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-2 col-form-label">Email:</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address">
                                </div>
                            </div>

                            <!-- Course Selection -->
                            <div class="mb-3 row">
                                <label for="course" class="col-sm-2 col-form-label">Course:</label>
                                <div class="col-sm-10">
                                    <select class="form-select" id="course" name="course">
                                        <option value="">Select Course</option>
                                        @foreach ($course as $c)
                                            <option value="{{ $c->course_name }}">{{ $c->course_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Password Field -->
                            <div class="mb-3 row">
                                <label for="password" class="col-sm-2 col-form-label">Password:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                </div>
                            </div>

                            <!-- Submit and Reset Buttons -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Register</button>
                                <button type="reset" class="btn btn-danger">Reset Form</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>