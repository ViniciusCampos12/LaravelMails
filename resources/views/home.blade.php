<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Selecione o tipo e-mail que deseja enviar</title>
        <link rel="stylesheet" href="{{asset('css/home.css')}}"/>
    </head>

<body>
<div class="container">
    <nav>
        <ul>
            <li class="li-notification"><a href="{{ route('notification.write') }}">Receber e-mail usando notification</a></li>
            <li class="li-mailable"><a href="{{ route('mailable.write') }}">Receber e-mail usando mailable</a></li>
        </ul>
    </nav>
</div>
</body>
</html>
