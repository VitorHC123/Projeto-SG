@extends("cliente.layout.index")
@section("sobre")

    <div class="txt_sobre">
        <h1> Conheça um pouco sobre nós </h1>
        <h4>No centro de tudo o que fazemos, está você, o jogador — nossa maior prioridade.</h4>
    </div>

    <div class="sobre_container">
        <div class="sobre_content">
            <img src="/gif/wallpaper_sobre.gif" class="img_sobre">
        </div>
    </div>

    <div class="sobre_caixastxt">
        <div class="caixa1">
            <h1 class="titulo_caixas">Missão</h1>
            <p>Nossa missão é criar experiências de jogo inovadoras e envolventes que conectem pessoas em todo o mundo, 
            promovendo criatividade, diversão e comunidade. Buscamos elevar o padrão da indústria de jogos e ser única, 
            entregando produtos que não apenas entretêm, mas também inspiram e fortalecem laços entre os jogadores.</p>
        </div>
        <hr>
        <div class="caixa2">
            <h1 class="titulo_caixas">Visão</h1>
            <p>Ser reconhecida como a principal desenvolvedora de jogos que transforma o entretenimento digital, 
                oferecendo produtos de qualidade superior que definem tendências e redefinem a maneira como as pessoas interagem com o mundo dos games. 
                Nosso objetivo é expandir os limites do possível, criando universos virtuais que sejam tão imersivos quanto significativos.</p>
        </div>
        <hr>
        <div class="caixa3">
            <h1 class="titulo_caixas">Valores</h1>
            <p> Buscamos inovação constante, valorizamos a comunidade e acreditamos na paixão pelos jogos. 
                Comprometemo-nos com a qualidade, promovemos diversidade e inclusão, 
                e adotamos práticas sustentáveis para o futuro da indústria.</p>
        </div>
      </div>


    <div class="sobre_quem_somos">
        <div class="img_logoSobre">
            <img src="img/logo3.png" alt="logo" class="sobre_img">
            <h1 class="titulo_quem_somos">Quem Somos</h1>
        </div>
        <div class="quem_somostxt">
            <p class="txt_quemsomos">
                Fundada em 2024, a StoreGaming é uma startup que promete revolucionar o mundo dos games com experiências 
                imersivas e inovadoras que conectam jogadores globalmente. Guiada pela paixão, excelência e comprometida 
                com a comunidade, diversidade e sustentabilidade, a StoreGaming busca não só acompanhar, 
                mas definir as tendências da indústria, criando jogos que inspiram, emocionam e transformam o entretenimento digital.
            </p>
        </div>
    </div>

     
      <div class="principal_contratacao">
        <div class="contracao">
            <div class="content">
                <h1>Estamos contratando!</h1>
                <p>Junte-se à SG para trilhar seu próprio caminho e criar experiências inesquecíveis para a comunidade.</p>
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

    <footer class="footer">
        <div class="footer_links">
            <a href="">Segurança</a>
            <a href="">Suporte ao jogador</a>
            <a href="">Missões</a>

        </div>
        <div class="footer_icons_contact">
        <a href="#" class="footer-social-icon"><i class="fab fa-facebook-f"></i></a>
            <a href="#" ><i class="fab fa-youtube"></i></a>
            <a href="#" ><i class="fab fa-instagram"></i></a>
            <a href="#" ><i class="fab fa-twitter"></i></a>
            <a href="#" ><i class="fab fa-discord"></i></a>
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
