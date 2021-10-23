<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$book->title}}</title>
    <style>
        @font-face {
            font-family: 'Kalam';
            src: url({{asset('fonts/Kalam-Regular.ttf')}});
            font-weight: normal;
        }
        @font-face {
            font-family: 'Kalam';
            src: url({{asset('fonts/Kalam-Bold.ttf')}});
            font-weight: bold;
        }
        body {
            font-family: 'Kalam';
        }
    </style>
</head>
<body>

    <h1>{{$book->title}}</h1>
    <span>ISBN:</span>
    <div>{{$book->isbn}}</div>
    <span>pages:</span>
    <div>{{$book->pages}}</div>
    <span>about:</span>
    <div>{{$book->about}}</div>


</body>
</html>
