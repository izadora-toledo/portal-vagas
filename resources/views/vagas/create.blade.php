@extends('layouts.app')

@section('content')

  <div class="container">
    <header>
      <h1>{{ isset($vaga) ? 'Editar' : 'Criar nova' }} Vaga</h1>
    </header>
    <main>
<form method="POST" action="{{ $vaga->id ? route('vagas.update', $vaga->id) : route('vagas.store') }}">
@csrf
@if ($vaga->id)
    @method('PUT')
@endif
<div class="form-group">
  <label for="titulo">Título:</label>
  <input type="text" name="titulo" value="{{ $vaga->titulo }}" class="form-control">
</div>
<div class="form-group">
  <label for="descricao">Descrição:</label>
  <textarea name="descricao" class="form-control">{{ $vaga->descricao }}</textarea>
</div>
<div class="form-group">
  <label for="empresa">Empresa:</label>
  <input type="text" name="empresa" value="{{ $vaga->empresa }}" class="form-control">
</div>
<div class="form-group">
  <label for="localizacao">Localização:</label>
  <input type="text" name="localizacao" value="{{ $vaga->localizacao }}" class="form-control">
</div>
<div class="form-group">
  <label for="tipo_contratacao">Tipo de Contratação:</label>
  <select name="tipo_contratacao" class="form-control">
    <option value="CLT" {{ $vaga->tipo_contratacao == 'CLT' ? 'selected' : '' }}>CLT</option>
    <option value="PJ" {{ $vaga->tipo_contratacao == 'PJ' ? 'selected' : '' }}>PJ</option>
    <option value="Freelancer" {{ $vaga->tipo_contratacao == 'Freelancer' ? 'selected' : '' }}>Freelancer</option>
  </select>
</div>
<div class="form-group">
  <label for="salario">Salário:</label>
  <input type="text" name="salario" value="{{ $vaga->salario }}" class="form-control">
</div>
<div class="form-group">
  <label for="status">Status:</label>
  <select name="status" class="form-control">
    <option value="ATIVO" {{ $vaga->status == 'ATIVO' ? 'selected' : '' }}>Ativo</option>
    <option value="ENCERRADO" {{ $vaga->status == 'ENCERRADO' ? 'selected' : '' }}>Encerrado</option>
    <option value="PAUSADO" {{ $vaga->status == 'PAUSADO' ? 'selected' : '' }}>Pausado</option>
  </select>
</div>
<button type="submit" class="btn btn-primary">
    {{ $vaga->id ? 'Editar Vaga' : 'Criar Nova Vaga' }}
</button>
</form>
</main>

<footer>
  <p>&copy; 2022 - Todos os direitos reservados.</p>
</footer>
</div>
@endsection
@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif


