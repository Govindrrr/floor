<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .body{
            background-color: rebeccapurple;
            border-radius: 30px;
            padding: 20px;
            width: 50%;
            margin:auto;
        }
        .body h1{
            font-size:28px;
        }
        .body p{
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div>
        <h1>
            Dear {{$data['to']}}
        </h1>
        <p>
            {{$data['message']}}
        </p>
        {{asset('admin/login')}}
        <footer>
            REgards,
        </footer>
    </div>
</body>
</html>