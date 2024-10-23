<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/loginCss.css">
    <link rel="icon" href="/icons/SG2.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Fazer login</title>
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

            

            <form method="POST" action="/login-user">
                @csrf
            <div class="tela_login">
                    @if ($errors->all())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                @endforeach
                @endif
                <div class="txt_tela_login">
                    <h1>Fazer Login</h1>
                </div>
                <div class="campo_txt">
                    <input type="email" placeholder="Email" name="email">
                    <input type="password" placeholder="Senha" name="password">
                    
                </div>
                    <div class="checkbox">
                        <input type="checkbox" class="check">
                        <p>Manter conectado</p>
                    </div>
                <div class="btn_login">
                    {{-- <input type="submit" class="button-53" role="button" value="Login"> --}}
                    <button type="submit" class="button-53">Login</button>
                    <a href="/registrar" class="btn_criarConta">Criar conta</a>
                </div>
            </div>

        </form>
        </div>
        
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>