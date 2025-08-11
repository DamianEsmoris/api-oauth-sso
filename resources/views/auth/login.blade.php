<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
</head>
<body>
    @if(session('error'))
        <div style="color:red">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <input placeholder="email" name="email" />
        <input placeholder="password" name="password" />
        <input type="submit" />
    </form>

    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <input type="submit" value="logout"/>
    </form>
    <a href="/register">create a new account</a>
</body>
</html>
