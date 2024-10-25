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
        <div class="card-title">Perfis cadastrados</div>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div id="success-message" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#example">Novo jogo</a>
            </div>
        </div>
        <table class="table table-head-bg-primary mt-4">
            <thead>
                <tr>
                    <th scope="col">Códigos</th>
                    <th scope="col">Nomes</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Imagem perfil</th>
                    <th scope="col">Imagem fundo</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jogo as $linha)
                    <tr>
                        <td>{{ $linha->id }}</td>
                        <td>{{ $linha->nome }}</td>
                        <td>{{ $linha->descricao }}</td>
                        <td>{{ $linha->preco }}</td>
            
                        <td>
                            @if($linha->imagemPerfil)
                                <img src="{{ asset('storage/'.$linha->imagemPerfil->img) }}" alt="{{ $linha->imagemPerfil->img_nome }}" width="50">
                            @else
                                <span>Sem imagem de perfil</span>
                            @endif
                        </td>
            
                        <td>
                            @if($linha->imagemFundo)
                                <img src="{{ asset('storage/'.$linha->imagemFundo->img) }}" alt="{{ $linha->imagemFundo->img_nome }}" width="50">
                            @else
                                <span>Sem imagem de fundo</span>
                            @endif
                        </td>
            
                        <td>{{ $linha->genero->genero }}</td>
            
                        <td>
                            <button type="button" class="btn btn-success btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#exampleModal" 
                                    onclick="openEditModal({{ json_encode($linha) }})">
                                <i class="fa fa-pencil"></i>

                                <form action="{{ route('jogo_excluir', ['jogo' => $linha->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Tem certeza que deseja excluir este jogo?')">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar jogo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('jogo_atualizar', ['jogo' => $linha->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="user-id" value="{{ $linha->id }}">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nome" id="user-name" value="{{ $linha->nome }}" required>
                        <label for="user-name">Nome</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="descricao" id="user-descricao" value="{{ $linha->descricao }}" required>
                        <label for="user-descricao">Descrição</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="preco" id="user-preco" value="{{ $linha->preco }}" required>
                        <label for="user-preco">Preço</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control" name="jogo_img" id="user-jogo_img" accept="image/*">
                        <label for="user-jogo_img">Imagem perfil</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="genero" id="user-genero" value="{{ $linha->fk_id_genero }}" required>
                        <label for="user-genero">Gênero</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control" name="img" id="user-img" accept="image/*">
                        <label for="user-img">Imagem fundo</label>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Salvar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="example" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Jogo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('SalvarNovoJogo') }}">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nome" id="jogo-nome" required>
                        <label for="jogo-nome">Nome do Jogo</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="descricao" id="jogo-descricao" required>
                        <label for="jogo-descricao">Descrição</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="preco" id="jogo-preco" required>
                        <label for="jogo-preco">Preço</label>
                    </div>

                    <!-- Seleção de Imagem de Perfil -->
                  
                    <div class="form-floating mb-3">
                        <select class="form-control" name="jogo_img" id="jogo-img-perfil" required>
                            <option value="" disabled selected>Selecione a Imagem de Perfil</option>
                            @foreach($imagens as $img)
                                <option value="{{ $img->id }}" data-img-src="{{ asset('storage/'.$img->img) }}">
                                    {{ $img->img_nome }}
                                </option>
                            @endforeach
                        </select>
                        <label for="jogo-img-perfil">Imagem de Perfil</label>
                    </div>
                
                    <!-- Imagem de Fundo -->
                    <div class="form-floating mb-3">
                        <select class="form-control" name="fk_id_imgs" id="jogo-img-fundo" required>
                            <option value="" disabled selected>Selecione a Imagem de Fundo</option>
                            @foreach($imagens as $img)
                                <option value="{{ $img->id }}" data-img-src="{{ asset('storage/'.$img->img) }}">
                                    {{ $img->img_nome }}
                                </option>
                            @endforeach
                        </select>
                        <label for="jogo-img-fundo">Imagem de Fundo</label>
                    </div>

                    <!-- Seleção de Gênero -->
                    <div class="form-floating mb-3">
                        <select class="form-control" name="fk_id_genero" id="jogo-genero" required>
                            <option value="" disabled selected>Selecione o Gênero</option>
                            @foreach($generos as $genero)
                                <option value="{{ $genero->id }}">{{ $genero->genero }}</option>
                            @endforeach
                        </select>
                        <label for="jogo-genero">Gênero</label>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Salvar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>


<script>
    function openEditModal(jogo) {
        $('#user-id').val(jogo.id);
        $('#user-name').val(jogo.nome);
        $('#user-descricao').val(jogo.descricao);
        $('#user-preco').val(jogo.preco);
        $('#user-genero').val(jogo.fk_id_genero); 
        $('#user-jogo_img').val(''); 
        $('#user-img').val(''); 
    }
    
    $(document).ready(function() {
        function formatState(state) {
            if (!state.id) {
                return state.text;
            }
            var baseUrl = $(state.element).data('img-src');
            var $state = $(
                '<span><img src="' + baseUrl + '" class="icon-img" /> ' + state.text + '</span>'
            );
            return $state;
        }
    
        $('#jogo-img-perfil').select2({
            templateResult: formatState,
            templateSelection: formatState,
            width: '100%'
        });
    
        $('#jogo-img-fundo').select2({
            templateResult: formatState,
            templateSelection: formatState,
            width: '100%'
        });
    });
    </script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@stop