<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Do 10</title>
</head>
<body>
    <h1 style="color:green;">{{$digit}}</h1>
    <form action="{{route('multi10')}}" method="GET">

        <div>Digit: <input type="text" name="digit"><div>

        <button type="submit">
            <h1 style="color:pink;">GO GO</h1>
        </button>

    </form>
</body>
</html>
