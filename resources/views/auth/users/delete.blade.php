@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Delete Account') }}</div>
                <div class="card-body">
                    <p>{{ __('Tem certeza que deseja deletar sua conta?') }}</p>

                    <form action="{{ route('user.delete', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Deletar Usuário') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection