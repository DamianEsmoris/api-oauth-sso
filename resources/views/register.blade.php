<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
</head>
<body>
    @if(session('error'))
        <div style="color:red">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ url('/register') }}">
        @csrf
        <input placeholder="name" name="name" />
        <input placeholder="email" name="email" />
        <input placeholder="password" name="password" />
        <input placeholder="password" name="password_confirmation" />
        <input type="submit" />
    </form>
</body>
</html>
