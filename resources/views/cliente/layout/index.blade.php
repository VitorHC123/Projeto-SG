<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/cssPrincipal.css">
    <link rel="stylesheet" href="/css/cssSobre.css">
    <link rel="stylesheet" href="/css/cssTrabalheConosco.css">
    <link rel="stylesheet" href="/css/cssNoticias.css">
    <link rel="icon" href="/icons/SG2.png">
    <title>Store Games</title>
</head>
<body>
    <header id="header">
        <nav>
            <div class="nav-content">
                <div class="left-side">
                    <div class="logo_img">
                        <a href="/">
                            <img class="img" src="/img/logo3.png" alt="Logo">
                        </a>
                    </div>
                    <ul class="nav-links">
                        <li><a href="/sobre">Sobre</a></li>
                        <li><a href="/noticias">Notícias</a></li>
                        <li><a href="/trabalhe-conosco">Trabalhe conosco</a></li>
                    </ul>
                </div>
                <div class="right-side">
                    <form action="login">
                        <button class="btn_login">Entrar</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    @yield("noticias")
    @yield("sobre")
    @yield("principal")
    @yield("trabalhe_conosco")

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        $(document).ready(function(){
            var previousScroll = 0;
            var header = $('#header');

            $(window).scroll(function(){
                var currentScroll = $(this).scrollTop();

                if (currentScroll > previousScroll){
                    header.css({
                        "top": "-100px",
                        "opacity": "0"
                    });
                } else {
                    header.css({
                        "top": "0",
                        "opacity": "1"
                    });
                }
                previousScroll = currentScroll;
            });
        });
</script>
</body>
</html>
