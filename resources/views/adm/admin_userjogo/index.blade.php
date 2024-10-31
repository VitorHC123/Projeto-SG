@extends('adm.admin_layout.index')
@section('principalAdm')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .icon-img {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            vertical-align: middle;
        }
    </style>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Lista de Downloads</div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div id="success-message" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-4">
                    
                </div>
            </div>


            <table class="table table-head-bg-primary mt-4">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Usuário</th>
                        <th scope="col">Jogo</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Nº NF</th>
                        <th scope="col">Status</th>
                        <th scope="col">Data de Download</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dados as $dado)
                        <tr>
                            <td>{{ $dado->id }}</td>
                            <td>{{ $dado->usuario->name }}</td>
                            <td>{{ $dado->jogo->nome }}</td>
                            <td>{{ $dado->valor }}</td>
                            <td>{{ $dado->payment_id }}</td>
                            <td>{{ $dado->status }}</td>
                            <td>{{ $dado->download_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
