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
        
        <table class="table table-head-bg-primary mt-4">
            <thead>
                <tr>
                    <th scope="col">Códigos</th>
                    <th scope="col">Nomes</th>
                    <th scope="col">Emails</th>
                    <th scope="col">Senhas</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $linha)
                    <tr>
                        <td>{{ $linha->id }}</td>
                        <td>{{ $linha->name }}</td>
                        <td>{{ $linha->email }}</td>
                        <td>{{ $linha->password }}</td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#exampleModal" 
                                    onclick="openEditModal({{ json_encode($linha) }})">
                                <i class="fa fa-pencil"></i>
                            </button>
                            
                            <form action="{{ route('cad_excluir', ['id' => $linha->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Tem certeza que deseja excluir este usuário?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar usuários</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('cad_alt_salva') }}">
                    @csrf
                    <input type="hidden" name="id" id="user-id" value="">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" id="user-name" value="" required>
                        <label for="user-name">Nome</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="user-email" value="" required>
                        <label for="user-email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Senha (deixe vazio para manter a atual)" id="user-password">
                        <label for="user-password">Senha</label>
                    </div>
                   
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirme a senha" id="user-password-confirmation">
                        <label for="user-password-confirmation">Confirme a senha</label>
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
