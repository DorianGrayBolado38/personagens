@extends('layout')

@section('content')

<h1>Lista de Personagens</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card-container">
    @foreach($registrosPersonagem as $personagem)
        <div class="card">
            <img src="{{ asset('storage/' . $personagem->imgPersonagem) }}" alt="{{ $personagem->nomePersonagem }}" class="card-img" data-toggle="modal" data-target="#modal-{{ $personagem->id }}">
            <div class="card-body">
                <h3 class="card-title">{{ $personagem->nomePersonagem }}</h3>
                <p class="card-text">Data de Criação: {{ $personagem->dataPersonagem }}</p>
                <p class="card-text">Obra: {{ $personagem->obraPersonagem }}</p>
                <div class="card-actions">
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal-{{ $personagem->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel-{{ $personagem->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel-{{ $personagem->id }}">{{ $personagem->nomePersonagem }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="{{ asset('storage/' . $personagem->imgPersonagem) }}" alt="{{ $personagem->nomePersonagem }}" class="img-fluid">
                        <p>Data de Criação: {{ $personagem->dataPersonagem }}</p>
                        <p>Obra: {{ $personagem->obraPersonagem }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<style>
.card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    padding: 20px;
}

.card {
    border: 1px solid #fff;
    border-radius: 10px;
    width: 200px; /* Ajuste o tamanho conforme necessário */
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

.card-img {
    width: 100%;
    height: auto;
    cursor: pointer; /* Adiciona um cursor de ponteiro ao passar o mouse */
}
</style>

@endsection
