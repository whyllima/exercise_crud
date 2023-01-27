<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Contact</title>

</head>

<body>

    <nav class="navbar navbar-dark bg-mynav">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Contact</a>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex bd-highlight mb-3">
            <div class="me-auto p-2 bd-highlight">
                <h2>Details
            </div>
            <div class="p-2 bd-highlight">
                <button type="button" class="btn btn-primary"
                    onclick="window.location='{{ URL::route('contactsHome') }}'">Home</button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">e-mail</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody id="mytable">
                    <tr>
                        <td>{{ $contact['id'] }}</td>
                        <td>{{ $contact['name'] }}</td>
                        <td>{{ $contact['contact'] }}</td>
                        <td>{{ $contact['email'] }}</td>
                        <td scope="row">
                            <button type="button" class="btn btn-warning" onclick="editContact()">Edit</button>
                            <button type="button" class="btn btn-danger" onclick="editContact()">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.16/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</body>

</html>
