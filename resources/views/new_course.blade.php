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
                    <h3 class="text-center">New Course</h3>
                    <br>
                    <form action="{{ route('save_course') }}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Course Name : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" name="course">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Description : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword3" name="description">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Duration : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword3" name="duration">
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Save Course</button>
                        <button type="reset" class="btn btn-danger">Reset Form</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</body>

</html>
