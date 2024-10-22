<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard | Update News</title>
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
        <h1>Admin Dashboard</h1>
        <p>Update News Details</p>
    </div>

    <!-- Update News Form -->
    <div class="container d-flex justify-content-center my-5">
        <div class="w-75">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="text-center">Update News</h3>
                    <br>
                    <form action="{{ route('save_news_update', $news->id) }}" method="post">
                        @csrf
                        <!-- Title -->
                        <div class="row mb-3">
                            <label for="title" class="col-sm-2 col-form-label">Title:</label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ $news->title }}" class="form-control" id="title" name="title" required>
                            </div>
                        </div>
                        <!-- Description -->
                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label">Description:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $news->description }}</textarea>
                            </div>
                        </div>
                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-save">Save Update</button>
                            <button type="reset" class="btn btn-reset">Reset Form</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>