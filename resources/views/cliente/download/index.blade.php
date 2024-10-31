@extends('cliente.layout.index')

@section('principal')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .info-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .game-title {
            font-size: 2rem;
            font-weight: bold;
        }

        .game-info,
        .user-info,
        .status-info {
            margin-top: 15px;
            font-size: 1.1rem;
        }

        .btn-download {
            margin-top: 30px;
            padding: 10px 20px;
            font-size: 1.2rem;
            background-color: #28a745;
            border: none;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-download:hover {
            background-color: #218838;
        }

    
    </style>
    <br>
    <br>
    <br>
    <br>
    <br>


    <div class="info-container">
        <h2 class="game-title">{{ $jogo->nome }}</h2>
        <p class="game-info"><strong>Descrição:</strong> {{ $jogo->descricao }}</p>
        <p class="user-info"><strong>Usuário:</strong> {{ Auth::user()->name }}</p>
        <p class="status-info"><strong>Status do Pagamento:</strong> {{ $status == 'approved' ? 'Aprovado' : 'Pendente' }}
        </p>
        @if ($status == 'approved')
        <a href="https://www.kto.com/pt/cassino/game/pgs_fortunetiger/">
            <button type="button" class="btn-download" id="download-button">Baixar</button>
        </a>
        @else
            <p style="color: red;">Pagamento não aprovado. Por favor, verifique o status no seu histórico.</p>
        @endif
    </div>

   
    




@stop
