<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TODO List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./resources/stylee.css">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-5">Add Your List</h1>
        <hr class="w-75 m-auto">
        <div class="w-50 m-auto mt-5">
            <div class="input-group mb-3">
                <input id="input" type="text" class="form-control" placeholder="Add New List"
                    aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-primary" type="button" id="button-addon2"><i
                        class="bi bi-plus-square-fill"></i></button>
            </div>
        </div>
        <div id="list">
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <script src="./resources/app.js"></script>
</body>

</html>