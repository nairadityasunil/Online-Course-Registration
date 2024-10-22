<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            filter: brightness(1);
        }
    </style>
</head>

<body class="bg-light">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Admin Dashboard</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <a href="{{ route('new_student') }}" class="btn btn-outline-primary w-100">
                                    Register Student
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="{{ route('all_students') }}" class="btn btn-outline-danger w-100">
                                    View All Students
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="{{ route('all_courses') }}" class="btn btn-outline-warning w-100">
                                    View All Courses
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="{{ route('new_course') }}" class="btn btn-outline-success w-100">
                                    Create New Course
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="{{ route('new_update') }}" class="btn btn-outline-dark w-100">
                                    Post New Update
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="{{ route('all_news') }}" class="btn btn-outline-secondary w-100">
                                    View All News
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                        <p class="text-muted">© 2024 Admin Dashboard</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>