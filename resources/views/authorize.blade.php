<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Authorization</title>

</head>
<body>
    <form method="post" action="{{ route('passport.authorizations.approve') }}">
        @csrf
        <input type="hidden" name="state" value="{{ $request->state }}" />
        <input type="hidden" name="client_id" value="{{ $client->id }}" />
        <input type="hidden" name="auth_token" value="{{ $authToken }}" />
        <button type="submit">Authorize</button>
    </form>

    <form method="post" action="{{ route('passport.authorizations.deny') }}">
        @csrf
        @method('DELETE')

        <input type="hidden" name="state" value="{{ $request->state }}" />
        <input type="hidden" name="client_id" value="{{ $client->id }}" />
        <input type="hidden" name="auth_token" value="{{ $authToken }}" />
        <button>Cancel</button>
    </form>
</body>
</html>
