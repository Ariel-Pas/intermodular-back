<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php echo 'Usuarios Lista'; ?>
    <h2>usuarios.blade</h2>

    @if (Auth::user()->esAdmin())
        <h2>ADMIN</h2>
        @foreach($users as $user)
            <p>USERNAME: {{$user->nombre}}</p>
            <P>ROLE: {{$user->role}}</P>
        @endforeach
    @endif
    @if (Auth::user()->esCentro())
        <h2>CENTRO</h2>
        @foreach($users as $user)
            <p>USERNAME: {{$user->nombre}}</p>
            <P>ROLE: {{$user->role}}</P>
        @endforeach
    @endif
    @if (Auth::user()->esTutor())
        <h2>TUTOR</h2>
        @foreach($users as $user)
            <p>USERNAME: {{$user->nombre}}</p>
            <P>ROLE: {{$user->role}}</P>
        @endforeach
    @endif
</body>
</html>
