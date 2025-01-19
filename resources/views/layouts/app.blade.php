<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', 'My Laravel App')</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f4f4f9;
                color: #333;
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }

            header {
                background-color: #4CAF50;
                color: white;
                text-align: center;
                padding: 20px 0;
                font-size: 1.5em;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            footer {
                background-color: #4CAF50;
                color: white;
                text-align: center;
                padding: 10px 0;
                margin-top: auto;
                font-size: 0.9em;
            }

            .container {
                max-width: 800px;
                margin: 50px auto;
                background: #fff;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                padding: 20px;
            }
        </style>
    </head>

    <body>
        <header>
            <h1>My Laravel App</h1>
        </header>

        <div class="container">
            @yield('content')
        </div>

        <footer>
            <p>&copy; {{ date('Y') }} My Laravel App. All rights reserved.</p>
        </footer>
    </body>

</html>
