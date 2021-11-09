<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Go GO & Buy</title>
</head>
<body>
    <form action="{{route('start-payment')}}" method="POST">

        <div>Name<input type="text" name="buyer_name"><div>
        <div>Last Name<input type="text" name="buyer_last_name"><div>
        <div>Email<input type="text" name="buyer_email"><div>
        <div>Total<input type="text" name="total"><div>



        <button type="submit">
            <h1 style="color:pink;">GO GO</h1>
        </button>
        @csrf

    </form>
</body>
</html>
