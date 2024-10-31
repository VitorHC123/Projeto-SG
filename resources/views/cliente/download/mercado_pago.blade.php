@extends('cliente.layout.index')

@section('principal')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <div class="container_mercado">
        <div class="content_mercado">
            <div class="header_mercado">
                {{ $jogo->nome }}
            </div>
        </div>

        <div class="content_mercado">
            <div class="image_mercado">
                <img src="{{ asset('storage/' . $jogo->imagemPerfil->img) }}" alt="{{ $jogo->imagemPerfil->img_nome }}"
                    width="700" class="img_mercado">
            </div>
            <div class="info_mercado">
                <div class="title">
                    {{ $jogo->nome }}
                </div>
                <div class="description">
                    {{ $jogo->descricao }}
                </div>
                <div class="details">
                    <div class="detail-item">
                        <div class="detail-label"> Desenvolvedor: </div>
                        <div class="detail-value"> StoreGaming </div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"> Editor: </div>
                        <div class="detail-value"> Store </div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label"> Lançamento: </div>
                        <div class="detail-value"> {{ $jogo->created_at }}</div>
                    </div>
                </div>

                <div class="detail-item">
                    <div class="detail-label"> Valor: </div>
                    <div class="detail-value"> R${{ $jogo->preco }},00</div>
                </div>
                <div class="details">
                    <form action="{{ route('pagamento') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $jogo->id }}">
                        <button type="submit" class="button-mercado">Comprar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@stop
