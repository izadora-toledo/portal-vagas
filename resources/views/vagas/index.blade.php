@extends('layouts.app')

@section('content')

@push('scripts')
    <script src="{{ asset('js/script.js') }}"></script>
@endpush

<div class="container">
    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
        <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
        <script src="{{ asset('js/script.js') }}"></script>
    </head>
    <header>
        <h1>Vagas de Emprego</h1>
    </header>
    <hr>
    <form method="GET" action="{{ route('vagas.index') }}">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <input type="text" class="form-control" name="filtro" value="{{ request('filtro') }}" placeholder="Pesquisar...">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <select class="form-control" name="campo">
                        <option value="id" @if(request('campo') == 'id') selected @endif>ID</option>
                        <option value="titulo" @if(request('campo') == 'titulo') selected @endif>Título</option>
                        <option value="empresa" @if(request('campo') == 'empresa') selected @endif>Empresa</option>
                        <option value="localizacao" @if(request('campo') == 'localizacao') selected @endif>Localização</option>
                        <option value="tipo_contratacao" @if(request('campo') == 'tipo_contratacao') selected @endif>Tipo de Contratação</option>
                        <option value="salario" @if(request('campo') == 'salario') selected @endif>Salário</option>
                        <option value="status" @if(request('campo') == 'status') selected @endif>Status</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Pesquisar</button>
                <a href="{{ route('vagas.index') }}" class="btn btn-default"><i class="fa fa-refresh"></i> Resetar</a>
            </div>
        </div>
    </form>
    <hr>
    <main>
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Empresa</th>
                    <th>Localização</th>
                    <th>Tipo de Contratação</th>
                    <th>Salário</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                {{ $vagas->links('vendor.pagination.bootstrap-4') }} 
                @foreach($vagas as $vaga)
                <tr>
                    <td>{{ $vaga->titulo }}</td>
                    <td>{{ $vaga->empresa }}</td>
                    <td>{{ $vaga->localizacao }}</td>
                    <td>{{ $vaga->tipo_contratacao }}</td>
                    <td>{{ $vaga->salario }}</td>
                    <td>{{ $vaga->status }}</td>

                    <td>
                        <div class="btn-group">
                            <button class="btn btn-secondary rounded-circle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 50px; height: 50px; border-radius: 50%;">
                                <i class="fas fa-plus"></i>
                            </button>                        
                            <div class="dropdown-menu">
                                @if (Auth::check() && Auth::user()->id == 1)
                                    <a class="dropdown-item" href="{{ route('vagas.create') }}">Criar Nova Vaga</a> 
                                    <form method="POST" action="{{ route('vagas.edit', $vaga->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="dropdown-item d-block">Editar Vaga</button>
                                    </form>
                                    <form method="POST" action="{{ route('vagas.destroy', $vaga) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item d-block text-danger">Excluir</button>
                                    </form>

                                    @if ($vaga->status == 'ativo')
                                        <form action="{{ route('vagas.pausar', $vaga->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item d-block text-danger">Pausar Vaga</button>
                                        </form>
                                    @else
                                        <form action="{{ route('vagas.ativar', $vaga->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item d-block text-success">Ativar Vaga</button>
                                        </form>
                                    @endif
                                @endif
                                <form method="POST" action="{{ route('vagas.toggle-candidatura', $vaga->id) }}">
                                    @csrf
                                    <button type="submit" id="salvar" class="dropdown-item d-block {{ $vaga->ja_candidatou ? 'text-danger' : 'text-success' }}" {{ $vaga->status == 'encerrado' || $vaga->status == 'pausado' ? 'disabled' : '' }}>
                                        @if($vaga->ja_candidatou)
                                            Cancelar candidatura
                                        @else
                                            Candidatar-se
                                        @endif
                                    </button>
                                    @if (Auth::check())
                                        <input type="hidden" name="ja_candidatou_candidatos_id" value="{{ auth()->user()->id }}">
                                    @endif
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
    <footer>
        <p>&copy; 2023 - Criado por Izadora Toledo.</p>
    </footer>
</div>
@endsection
