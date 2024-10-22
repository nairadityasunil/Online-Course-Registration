<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-white text-center">
                        <h3>All Students</h3>
                    </div>
                    <div class="card-body">
                        <!-- Students Table -->
                        <table class="table table-bordered table-striped text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>DOB</th>
                                    <th>Contact</th>
                                    <th>Parents Contact</th>
                                    <th>Email</th>
                                    <th>Course</th>
                                    <th>Password</th>
                                    <th>Date & Time</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_students as $s)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $s->id }}</td>
                                        <td>{{ $s->name }}</td>
                                        <td>{{ $s->dob }}</td>
                                        <td>{{ $s->contact }}</td>
                                        <td>{{ $s->parent_contact }}</td>
                                        <td>{{ $s->email }}</td>
                                        <td>{{ $s->course_name }}</td>
                                        <td>{{ $s->password }}</td>
                                        <td>{{ $s->created_at }}</td>
                                        <td>
                                            <a href="{{ url('update_student', $s->id) }}" class="btn btn-warning btn-sm">Update</a>
                                        </td>
                                        <td>
                                            <form action="{{ url('delete_student', $s->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- No students message -->
                        @if ($all_students->isEmpty())
                            <div class="text-center text-muted">
                                <p>No students available at the moment.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>