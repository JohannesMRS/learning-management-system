<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('logout') }}" method = "POST">
        @csrf
        <button type = "submit">
            Logout
        </button>
    </form>
    <h1>Hello Mentee</h1>
</body>
</html>
