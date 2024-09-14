@extends('tamplate.layout.index')
@section('contato')
<div class="container">
        <!-- Seção de Título -->
        <section class="contact-title">
            <h1>Entre em Contato</h1>
            <p>Estamos aqui para ajudar! Preencha o formulário abaixo ou entre em contato através das nossas informações.</p>
        </section>

        <!-- Seção de Informações de Contato -->
        <section class="contact-info">
            <div class="info-item">
                <h2>Endereço</h2>
                <p>Rua Exemplo, 123 - Centro, São Paulo, SP, 01234-567</p>
            </div>
            <div class="info-item">
                <h2>Telefone</h2>
                <p>(11) 1234-5678</p>
            </div>
            <div class="info-item">
                <h2>E-mail</h2>
                <p>contato@computec.com.br</p>
            </div>
        </section>

        <!-- Seção de Formulário de Contato -->
        <section class="contact-form">
            <h2>Formulário de Contato</h2>
            <form action="#" method="post">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Mensagem</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </section>
    </div>
@stop
