<!-- resources/views/student/student_panel.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Welcome, {{ $student->name }}</h1>
            <form action="{{ route('logout') }}" method="POST" class="mb-0">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>

        <div class="row">
            <div class="col-sm-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h2>Your Profile</h2>
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $student->name }}</p>
                        <p><strong>Email:</strong> {{ $student->email }}</p>
                        <p><strong>Contact:</strong> {{ $student->contact }}</p>
                        <p><strong>Parent Contact:</strong> {{ $student->parent_contact }}</p>
                        <p><strong>Date of Birth:</strong> {{ $student->dob }}</p>
                        <p><strong>Course Name:</strong> {{ $student->course_name }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="card">
                    <div class="card-header">
                        <h2>Enrolled Courses</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Course Name</th>
                                    <th>Duration</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($enrolled as $ec)
                                    <tr>
                                        <td>{{$ec->course_name}}</td>
                                        <td>{{$ec->duration}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Profile Section -->

        <!-- Profile Update Form -->
        <div class="card mb-4">
            <div class="card-header">
                <h2>Update Profile</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('update_profile') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact:</label>
                        <input type="text" name="contact" id="contact" value="{{ $student->contact }}" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="parent_contact" class="form-label">Parent Contact:</label>
                        <input type="text" name="parent_contact" id="parent_contact" value="{{ $student->parent_contact }}" required class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Update Profile</button>
                </form>
            </div>
        </div>

        <!-- Available Courses Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h2>Available Courses</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->description }}</td>
                            <td>
                                <form action="{{ route('enroll_course', $course->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Enroll</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>