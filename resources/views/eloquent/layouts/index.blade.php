<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <title>Document</title>
    <style>
        body {
                font-family: 'Nunito', sans-serif;
                padding: 20px;
                margin: 20px
            }
            .container {
                display: flex;
            }
            /* sidebar */
            .sidebar {
                background-color: green;
                padding: 12px;
            }
            .linksContainer {
                display: flex;
                flex-direction: column
            }
            a {
                color: white;
                text-decoration: none
            }
            a:hover {
                background-color: burlywood;
                padding: 7px;
                border-radius: 8px
            }

            .active {
                background-color: burlywood;
                padding: 7px;
                border-radius: 8px
            }
            /* ****** */
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div>
                <h3>Defining Relationships</h3>
                <div class="linksContainer">
                <a href="{{ route('onetoone') }}" class="{{ Route::has('onetoone') ? 'active': ''}}">One To One</a>
                <a href="#">One To Many</a>
                <a href="#">One To Many(Inverse)</a>
                <a href="#">Has One Of Many</a>
                <a href="#">Has One Through</a>
                <a href="#">Has Many Through</a>
                </div>
            </div>
        </div>
        @yield('body')
    </div>
</body>
</html>