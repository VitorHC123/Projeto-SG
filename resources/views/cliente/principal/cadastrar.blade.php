<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/loginCss.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastre-se</title>
</head>

<body>
    <header>
        <nav class="nav_login">
            <a href="/"><img class="img" src="/img/logo3.png" alt="Logo"></a>

        </nav>
    </header>
    <main>
        <div class="principal_login">
            <div class="img_principal_login">
                <img src="/img/fundo_login.jpg" alt="">

            </div>



            <form method="POST" action="/registrar">
                @csrf
                <div class="tela_login">
                    @if ($errors->all())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                    <div class="txt_tela_login">
                        <h1>Cadastrar-se</h1>
                    </div>
                    <div class="campo_txt">
                        <input type="text" placeholder="Nome" name="name">
                        <input type="email" placeholder="E-mail" name="email">
                        <input type="password" placeholder="Senha" name="password">
                        <input type="password" placeholder="Confirmar Senha" name="password_confirmation">
                    </div>
                    <div class="btn_login">
                        <button type="submit" class="button-53">Cadastrar</button>
                        <a href="/login-user" class="btn_criarConta">Voltar</a>
                    </div>
                </div>
            </form>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
