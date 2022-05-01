<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Escreva seu e-mail</title>
        <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    </head>

<body>
    <main>
        <div class="container">
                <div class="form">
                    <p>Preencha os dados para receber um e-mail do tipo {{$slot}}</p>

                    <form action="{{route($route)}}" method="post">
                    @csrf

                        <input class="input" type="text" name="name" placeholder="Insira seu nome" value="{{old('name')}}">
                        @if($errors->has('name')) <span class="name-error">{{ $errors->first('name') }} </span> @endif

                        <input class="input" type="email" name="email" placeholder="Insira seu email" value="{{old('email')}}">
                         @if($errors->has('email')) <span class="email-error">{{ $errors->first('email') }} </span> @endif

                        <button class="btn" type='submit'>Enviar</button>

                    </form>
                </div>
        </div>
    </main>
</body>
</html>
