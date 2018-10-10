@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('usuario.index')}}">Usuarios</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Adicionar</li>
                    </ol>
                </nav>

                <div class="card-body">
                    <form action="{{ route('usuario.atualizar',$usuario->id) }}" method="post">
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="put">
                        <div class="form-group row">
                            <label for="nome" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" value="{{ $usuario->nome }}"  required autofocus>                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="data_nascimento" class="col-md-4 col-form-label text-md-right">{{ __('Data Nascimento') }}</label>

                            <div class="col-md-6">
                                <input id="data_nascimento" type="date" class="form-control" name="data_nascimento" value="{{ $usuario->data_nascimento }}" required autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="genero" class="col-md-4 col-form-label text-md-right">{{ __('Genero') }}</label>

                            <div class="col-md-6">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        @if($usuario->genero == "Masculino")
                                        <input type="radio" class="form-check-input" name="genero" value="Masculino" checked="true">Masculino
                                        @else
                                        <input type="radio" class="form-check-input" name="genero" value="Masculino">Masculino
                                        @endif
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        @if($usuario->genero == "Feminino")
                                        <input type="radio" class="form-check-input" name="genero" value="Feminino" checked="true">Feminino
                                        @else
                                        <input type="radio" class="form-check-input" name="genero" value="Feminino">Feminino
                                        @endif
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefone" class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>

                            <div class="col-md-6">
                                <input id="telefone" type="text" class="form-control" name="telefone" value="{{ $usuario->telefone }}" required autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>

                            <div class="col-md-6">
                                <input id="tipo" type="text" class="form-control" name="tipo" value="{{ $usuario->tipo }}" required autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $usuario->email }}"  required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="senha" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                            <div class="col-md-6">
                                <input id="senha" type="password" class="form-control" name="senha" value="" required>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Senha') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
