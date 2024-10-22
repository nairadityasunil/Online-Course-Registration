<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Course Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body class="bg-light">
    <div class="container d-flex justify-content-center my-5">
        <div class="w-75">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">Admin Dashboard</h3>
                    <br>
                    <a href="{{route('new_student')}}" class="btn btn-primary">Register Student</a>
                    <a href="{{route('all_students')}}" class="btn btn-danger">All Student</a>
                    <a href="{{route('all_courses')}}" class="btn btn-warning">All Course</a>
                    <a href="{{ route('new_course')}}" class="btn btn-success">New Course</a>
                   
                    <a href="{{route('all_news')}}" class="btn btn-secondary">All Updates</a>
                    <a href="{{ route('new_update')}}" class="btn btn-dark">New updates</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
