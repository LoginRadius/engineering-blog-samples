<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Register</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">MyApp</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Dashboard</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            @if (isset($status))
                <div class="alert alert-info">
                    {{ $status ?? ''}}
                </div>
            @endif
            <div class="px-4 mt-5 mb-5">
                <div class="row gx-5">
                        <div class="mx-auto" style="width:50%">
                            @if (isset($validation_error))
                                <div class="alert alert-danger">
                                    {{ $validation_error ?? ''}}
                                </div>
                            @endif
                            <div class="p-3 border bg-light text-center">
                                <form action="{{url('register')}}" method="post">
                                @csrf
                                <div class="form-group mb-4 mt-2">
                                    <input type="text" name="first_name" placeholder="First Name" class="form-control" />
                                </div>
                                <div class="form-group mb-4 mt-2">
                                    <input type="text" name="middle_name" placeholder="Middle Name" class="form-control" />
                                </div>
                                <div class="form-group mb-4 mt-2">
                                    <input type="text" name="last_name" placeholder="Last Name" class="form-control" />
                                </div>
                                <div class="form-group mb-4 mt-2">
                                    <input type="email" name="email" placeholder="Your Email" class="form-control" />
                                </div>
                                <div class="form-group mb-4 mt-2">
                                    <input type="password" name="password" placeholder="Your password" class="form-control" />
                                </div>
                                <div class="form-group mb-4 mt-2">
                                    <button type="submit" class="btn btn-outline-success btn-block">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
