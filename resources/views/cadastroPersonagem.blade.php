@extends('layout')
@section('content')

<div class="container">
</div>
<div class="card bg-dark text-white">
    <img class="card-img" src="{{ asset('storage\imagens\morrigan.gif') }}" alt="Card image">
    <div class="card-img-overlay">
        <h2 class="card-title">Aqui você vair registrar seus personagens</h5>
 

<form action="{{ route('cadastrar-personagem') }}" method="POST" enctype="multipart/form-data" class="container mt-4">
    @csrf <!-- Protege contra CSRF, necessário no Laravel -->

    <div class="mb-3">
        <label for="nomePersonagem" class="form-label">Nome do Personagem:</label>
        <input type="text" id="nomePersonagem" name="nomePersonagem" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="dataPersonagem" class="form-label">Data de Criação:</label>
        <input type="date" id="dataPersonagem" name="dataPersonagem" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="obraPersonagem" class="form-label">Obra do Personagem:</label>
        <input type="text" id="obraPersonagem" name="obraPersonagem" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="imgPersonagem" class="form-label">Imagem do Personagem:</label>
        <input type="file" id="imgPersonagem" name="imgPersonagem" accept="image/*" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Cadastrar Personagem</button>
</form>
   </div>
</div>

</div>
<style>

    .container{
        justify-self: start;
        justify-content: center ;
    }
</style>
@endsection
                             