<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title')
    </title>
    <style>
        * {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            box-sizing: border-box;
            font-size: 20px;
            line-height: 1.5em;
        }
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            background: #ffffff;
        }

        .container {
            max-width: 900px;
            margin: auto;
            padding: 1em;
        }

        h1 {
            font-size: 2em;
        }

        h2 {
            font-size: 1.5em;
            margin-top: 2em;
        }

        .form-group {
            width: 100%;
            margin: 1em 0;
        }

        .form-group label {
            display:  block;
        }

        .details {
            display: grid;
            gap: 1em;
            grid-template-columns: repeat(3, 1fr);
        }

        .card {
            border: 1px solid #ccc;
            padding: 0.5em;
            text-align: center;
        }

        .card .title {
            font-weight: bold;
        }

        @media screen and (max-width: 600px) {
            .details {
                grid-template-columns: repeat(1, 1fr);
            }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>
<body>
<div class="container">
    <h1>
        @yield('heading')
    </h1>

    @yield('content')
</div>

</body>
</html>
