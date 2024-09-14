<!-- resources/views/template/principal/produto.blade.php -->
@extends('tamplate.layout.index')

@section('produto')
<div class="container">
        <section class="products-title">
            <h1>Nossos Produtos (VISÃO DO USUÁRIO)</h1>
            <p>Descubra nossa gama de computadores e acessórios de alta qualidade.</p>
        </section>

        <section class="products-gallery">
            <div class="product-card">
                <img src="https://via.placeholder.com/300x200" alt="Computador Gamer X">
                <h2>Computador Gamer X</h2>
                <p>Desempenho máximo com hardware de ponta para jogos e tarefas exigentes.</p>
                <p class="price">R$ 4.500,00</p>
                <button class="btn btn-primary">Comprar</button>
            </div>
            <div class="product-card">
                <img src="https://via.placeholder.com/300x200" alt="Monitor Ultra HD">
                <h2>Monitor Ultra HD</h2>
                <p>Experiência visual incrível com resolução Ultra HD e cores vibrantes.</p>
                <p class="price">R$ 1.200,00</p>
                <button class="btn btn-primary">Comprar</button>
            </div>
            <div class="product-card">
                <img src="https://via.placeholder.com/300x200" alt="Teclado Mecânico RGB">
                <h2>Teclado Mecânico RGB</h2>
                <p>Teclado com iluminação RGB personalizável e switches mecânicos para máxima resposta.</p>
                <p class="price">R$ 300,00</p>
                <button class="btn btn-primary">Comprar</button>
            </div>
        </section>
    </div>
@stop
