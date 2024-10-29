@extends('cliente.layout.index')
@section('principal')

    <main>
        <div class="txt_principal">
            <div class="txt_principal2">
                <p>Uma Nova Era o aguarda!</p>
                <p>Store Gaming</p>
            </div>
            <div class="btn_principal">
                <a href="/download" class="btn10">
                    <span>Baixe agora</span>
                    <div class="transition"></div>
                </a>
            </div>
        </div>
        <div class="container">
            <div class="div_principal_img">
                <img src="../img/cod.jpg" class="img_principal" alt="Principal Image">
            </div>


            <div class="div_noticias">
                <p class="txt_noticia">Notícias</p>
                <div class="sub_div_noticias">
                    <div class="noticia">
                        <img src="../img/missao.png" alt="Notícia 1">
                        <p class="txt_img_noticia">Novidade: missões premiadas</p>
                    </div>
                    <div class="noticia">
                        <img src="../img/trailer.jpg" alt="Notícia 2">
                        <p class="txt_img_noticia">Invasão // Trailer nova animação</p>
                    </div>
                    <div class="noticia">
                        <img src="../img/podcastlol.jpg" alt="Notícia 3">
                        <p class="txt_img_noticia">PodCast - Nova Temporada</p>
                    </div>
                </div>
            </div>


            <div class="jogos">
                <div class="txt_jogos">
                    <p>Jogos Disponiveis</p>
                </div>

                @foreach ($jogo as $linha)
                    <form action="/download" method="GET">
                        <input type="hidden" name="id" value="{{ $linha->id }}">
                        <div class="sub_jogos">
                            <div class="jogo">
                                <button type="submit" >
                                    <img src="{{ asset('storage/' . $linha->imagemPerfil->img) }}">
                            </div>
                            </button>
                    </form>
                @endforeach
            </div>
        </div>
        </div>
        <div class="principal_contratacao">
            <div class="contracao">
                <div class="content">
                    <h1>Estamos contratando!</h1>
                    <p>Junte-se à SG para trilhar seu próprio caminho e criar experiências inesquecíveis para a comunidade.
                    </p>
                    <div class="stats">
                        <div class="stat">
                            <h2>110</h2>
                            <p>Vagas abertas</p>
                        </div>
                        <div class="stat">
                            <h2>25</h2>
                            <p>Setores</p>
                        </div>
                    </div>
                    <a href="#" class="button">Explorar carreiras</a>
                </div>
            </div>
            <div class="image-container">
                <img src="../img/imgcontrato.jpg" alt="Imagem de escritório StoreGaming">
            </div>
        </div>

    </main>

    <footer class="footer">
        <div class="footer_links">
            <a href="">Segurança</a>
            <a href="">Suporte ao jogador</a>
            <a href="">Missões</a>

        </div>
        <div class="footer_icons_contact">
            <a href="#" class="footer-social-icon"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-discord"></i></a>
        </div>

        <div class="footer_logo">
            <img src="../img/logo3.png">
        </div>
        <hr class="custom">
        <div class="footer_copyright">
            <p>©2024-2024 StoreGaming, Inc. STOREGAMING e todos os logotipos associados
                são marcas comerciais, marcas de serviço e/ou marcas registradas da StoreGaming, Inc.</p>
        </div>
        <div class="footer_age_classification">
            <img src="../img/age_class.png">
        </div>
    </footer>

@stop
