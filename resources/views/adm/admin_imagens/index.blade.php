@extends('adm.admin_layout.index')

@section('principalAdm')
<div class="card">
    <div class="card-header">
        <div class="card-title">Imagens cadastradas</div>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div id="success-message" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalNovaImagem">Nova Imagem</a>
            </div>
        </div>
        
        <table class="table table-head-bg-primary mt-4">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($imgs as $linha)
                <tr>
                    <td>{{ $linha->id }}</td>
                    <td>{{ $linha->img_nome }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $linha->img) }}"  width="80">
                    </td>
                    
                    <td>
                            <button type="button" class="btn btn-success btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modalEditImagem" 
                                    onclick="openEditModal({{ json_encode($linha) }})">
                                <i class="fa fa-pencil"></i>
                            </button>
                            
                            <form action="{{ route('img_excluir', ['id' => $linha->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Tem certeza que deseja excluir esta imagem?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach 
            </tbody>
        </table>
        
          
</div>

<div class="modal fade" id="modalNovaImagem" tabindex="-1" aria-labelledby="modalNovaImagemLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalNovaImagemLabel">Nova Imagem</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('SalvarNovaImagem') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="img_nome" placeholder="Nome da Imagem" required>
                        <label for="img_nome">Nome da Imagem</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="file" class="form-control" name="img" required>
                        <label for="img">Escolha a Imagem</label>
                    </div>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditImagem" tabindex="-1" aria-labelledby="modalEditImagemLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalEditImagemLabel">Editar Imagem</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data" id="editImageForm"> 
                    @csrf
                    <input type="hidden" name="id" id="imgs-id">
                    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="img_nome" id="imgs-img_nome" required>
                        <label for="imgs-img_nome">Nome da Imagem</label>
                    </div>
                    
                    <div class="form-floating mb-3"><br><br>
                        <img id="current-image" src="" alt="" width="80"><br>
                        <label for="imgs-img">Escolher nova Imagem (opcional)</label><br>
                        <input type="file" class="form-control" name="img">
                    </div>
                    
                    <button type="submit" class="btn btn-success">Salvar Alterações</button>
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

    function openEditModal(img) {
    document.getElementById('imgs-id').value = img.id; 
    document.getElementById('imgs-img_nome').value = img.img_nome; 

    const imgElement = document.getElementById('current-image');
    imgElement.src = `{{ asset('storage') }}/${img.img}`; 
    imgElement.alt = img.img_nome; 

    const form = document.getElementById('editImageForm');
    form.action = `{{ url('imagens/udp') }}/${img.id}`; 
}
</script>



@stop
