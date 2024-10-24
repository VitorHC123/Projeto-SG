@extends('adm.admin_layout.index')
@section('principalAdm')

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
                    <th scope="col">Genero</th>
                    <th scope="col">Imagem fundo</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach($jogo as $linha)
                    <tr>
                        <td>{{ $linha->id }}</td>
                        <td>{{ $linha->nome }}</td>
                        <td>{{ $linha->descricao }}</td>
                        <td>{{ $linha->preco }}</td>
                        <td>{{ $linha->jogo_img }}</td>
                        <td>{{ $linha->genero }}</td> <!--TABELA GENERO-->
                        <td>{{ $linha->img }}</td> <!--TABELA IMGS-->
                        <td>
                            <button type="button" class="btn btn-success btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#exampleModal" 
                                    onclick="openEditModal({{ json_encode($linha) }})">
                                <i class="fa fa-pencil"></i>
                            </button>
                            
                            <form action="{{ route('jogo_excluir', ['id' => $linha->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach --}}
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
                {{-- <form method="POST" action="{{ route('jogo_alt_salva') }}">
                    @csrf
                    <input type="hidden" name="id" id="user-id" value="">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" id="user-name" value="" required>
                        <label for="user-name">Nome</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="descricao" id="user-name" value="" required>
                        <label for="user-name">Descrição</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="preco"  id="user-name" value="" required>
                        <label for="user-password">Preço</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="image" class="form-control" name="jogo_img" id="user-name" value="" required>
                        <label for="user-name">Imagem perfil</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="genero" id="user-name" value="" required>
                        <label for="user-name">Genero</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="image" class="form-control" name="img" id="user-name" value="" required>
                        <label for="user-name">Imagem fundo</label>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Salvar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </form> --}}
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="example" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo jogo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- <form method="POST" action="{{ route('jogo_alt_salva') }}">
                    @csrf
                    <input type="hidden" name="id" id="user-id" value="">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" id="user-name" value="" required>
                        <label for="user-name">Nome</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="descricao" id="user-name" value="" required>
                        <label for="user-name">Descrição</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="preco"  id="user-name" value="" required>
                        <label for="user-password">Preço</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="image" class="form-control" name="jogo_img" id="user-name" value="" required>
                        <label for="user-name">Imagem perfil</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="genero" id="user-name" value="" required>
                        <label for="user-name">Genero</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="image" class="form-control" name="img" id="user-name" value="" required>
                        <label for="user-name">Imagem fundo</label>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Salvar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </form> --}}
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
      
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            
            setTimeout(function() {
                successMessage.style.display = 'none'; 
            }, 5000);
        }
    });

    function openEditModal(user) {
        document.getElementById('user-id').value = user.id;
        document.getElementById('user-name').value = user.name;
        document.getElementById('user-email').value = user.email;
        document.getElementById('user-password').value = ''; 
    }
</script>

@stop