@extends('cliente.layout.index')
@section('principal')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <br><br><br><br><br><br><br><br>
    <form action="" method="POST" style="display:inline; z-index:99;">
        @csrf
        <button type="button" class="btn btn-success">
            Comprar Jogo
        </button>
    </form>
   