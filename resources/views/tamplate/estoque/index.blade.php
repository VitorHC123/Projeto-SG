@extends('tamplate.layout.index')

@section('estoque')
    <div class="container">
        <section class="stock-title">
            <h1>Gestão de Estoque</h1>
            <p>Aqui você pode visualizar e gerenciar o estoque de nossos produtos.</p>
        </section>

        <section class="stock-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Produto</th>
                        <th>Categoria</th>
                        <th>Quantidade</th>
                        <th>Preço Unitário</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Computador Gamer X</td>
                        <td>Computadores</td>
                        <td>15</td>
                        <td>R$ 4.500,00</td>
                        <td>
                            <button class="btn btn-warning">Editar</button>
                            <button class="btn btn-danger">Excluir</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Monitor Ultra HD</td>
                        <td>Monitores</td>
                        <td>25</td>
                        <td>R$ 1.200,00</td>
                        <td>
                            <button class="btn btn-warning">Editar</button>
                            <button class="btn btn-danger">Excluir</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
@stop