-<!DOCTYPE html>
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
        <div class="w-100">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">Update Student Form</h3>
                    <br>
                    <form action="{{ url('save_student_update') }}/{{$student->id}}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Name : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" value="{{$student->name}}" name="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">DOB : </label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="inputEmail3" value="{{$student->dob}}" name="dob">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Contact : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" name="contact" value="{{$student->contact}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Parent Contact : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" value="{{$student->parent_contact}}" name="parent_contact">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email : </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" name="email" value="{{$student->email}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Course : </label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="course">
                                    <option value="{{$student->course_name}}">{{$student->course_name}}</option>
                                    @foreach ($course as $c)
                                        <option value="{{$c->course_name}}">{{$c->course_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Password : </label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputEmail3" name="password">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Login</button>
                        <button type="reset" class="btn btn-danger">Reset Form</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</body>

</html>
