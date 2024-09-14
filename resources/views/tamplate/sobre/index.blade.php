<!-- resources/views/template/principal/sobre.blade.php -->
@extends('tamplate.layout.index')

@section('sobre')
<div class="container my-5">
    <!-- Seção de Introdução -->
    <section class="intro-section mb-5">
        <h1 class="display-3 title">Sobre a ComputerTec</h1>
        <p class="lead description">A ComputerTec é especializada na venda de computadores e soluções tecnológicas. Desde nossa fundação, temos oferecido produtos de alta qualidade para atender às necessidades de nossos clientes, garantindo desempenho e confiabilidade.</p>
    </section>

    <!-- Seção de História -->
    <section class="history-section mb-5">
        <h2 class="section-title text-center">Nossa História</h2>
        <div class="content-box">
            <p>Fundada em 2015, a ComputerTec começou com a missão de fornecer equipamentos de computação de ponta a preços competitivos. Nosso foco é a qualidade e a inovação, e temos trabalhado incansavelmente para garantir que nossos clientes recebam os melhores produtos e o melhor atendimento possível.</p>
            <p>Com o crescimento da empresa, expandimos nosso portfólio para incluir uma ampla gama de produtos e acessórios, atendendo tanto a clientes individuais quanto a empresas. Nosso compromisso é continuar evoluindo e adaptando nossos produtos às novas tecnologias e necessidades do mercado.</p>
        </div>
    </section>

    <!-- Seção de Valores -->
    <section class="values-section mb-5">
        <h2 class="section-title text-center">Nossos Valores</h2>
        <ul class="values-list">
            <li><i class="fas fa-laptop icon"></i> Qualidade</li>
            <li><i class="fas fa-tags icon"></i> Custo-Benefício</li>
            <li><i class="fas fa-headphones icon"></i> Suporte ao Cliente</li>
            <li><i class="fas fa-shield-alt icon"></i> Confiabilidade</li>
        </ul>
    </section>

    <!-- Seção de Equipe -->
    <section class="team-section mb-5">
        <h2 class="section-title text-center">Nossa Equipe</h2>
        <div class="team-info">
            <p><strong>João Oliveira</strong> - CEO: João é o fundador da ComputerTec e tem uma vasta experiência no setor de tecnologia. Seu objetivo é proporcionar aos clientes a melhor experiência possível com produtos de qualidade e excelente atendimento.</p>
            <p><strong>Maria Santos</strong> - Gerente de Vendas: Maria lidera a equipe de vendas com foco em oferecer soluções personalizadas para cada cliente. Ela é dedicada a entender as necessidades dos clientes e fornecer o melhor atendimento possível.</p>
            <p><strong>Lucas Almeida</strong> - Técnico de Suporte: Lucas é responsável por garantir que todos os produtos estejam funcionando perfeitamente. Seu conhecimento técnico e sua abordagem proativa garantem que os problemas sejam resolvidos rapidamente.</p>
            <!-- Adicione mais membros da equipe conforme necessário -->
        </div>
    </section>
</div>
@stop
