<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Raleway:700);
        *, *:before, *:after {
            box-sizing: border-box;
        }
        html {
            height: 100%;
        }
        body {
            background: url(https://i.imgur.com/76NZB7A.gif) no-repeat center center fixed;
            background-size: cover;
            font-family: 'Raleway', sans-serif;
            background-color: #342643;
            height: 100%;
        }
        .text-wrapper {
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .title {
            font-size: 6em;
            font-weight: 700;
            color: #ee4b5e;
        }
        .subtitle {
            font-size: 40px;
            font-weight: 700;
            color: #1fa9d6;
        }
        .buttons {
            margin: 30px;
        }
        .buttons a.button {
            font-weight: 700;
            border: 2px solid #ee4b5e;
            text-decoration: none;
            padding: 15px;
            text-transform: uppercase;
            color: #ee4b5e;
            border-radius: 26px;
            transition: all 0.2s ease-in-out;
        }
        .buttons a.button:hover {
            background-color: #ee4b5e;
            color: white;
            transition: all 0.2s ease-in-out;
        }
    </style>
</head>
<body>
<div class="text-wrapper">
    <div class="title" data-content="404">
        404
    </div>

    <div class="subtitle">
        Oops, the page you're looking for doesn't exist.
    </div>

    <div class="buttons">
        <a class="button" href="/admin">Go to homepage</a>
    </div>
</div>
</body>
</html>
