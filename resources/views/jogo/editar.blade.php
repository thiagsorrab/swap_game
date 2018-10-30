@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('jogo.index')}}">Jogos</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Editar</li>
                    </ol>
                </nav>

                <div class="card-body">
                    <form action="{{ route('jogo.atualizar',$jogo->id) }}" method="post">
                        {{ csrf_field() }}

                        <input type="hidden" name="_method" value="put">
                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Titulo') }}</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control" name="titulo" value="{{ $jogo->titulo }}"  required autofocus>                                
                            </div>
                        </div>

						<div class="form-group row">
							<label for="estado" class="col-md-4 col-form-label text-md-right">Estado</label>
							<div class="col-md-6">
								<select class="form-control" id="estado" name="estado">
									@if($jogo->estado == "Otimo")
									<option value="Otimo" selected="true" >Otimo</option>
									@else
									<option value="Otimo" >Otimo</option>
									@endif

									@if($jogo->estado == "Bom")
									<option value="Bom" selected="true" >Bom</option>
									@else
									<option value="Bom" >Bom</option>
									@endif

									@if($jogo->estado == "Ruim")
									<option value="Ruim" selected="true" >Ruim</option>
									@else
									<option value="Ruim" >Ruim</option>
									@endif

									@if($jogo->estado == "Pessimo")
									<option value="Pessimo" selected="true" >Pessimo</option>
									@else
									<option value="Pessimo" >Pessimo</option>
									@endif

								</select>
							</div>
						</div>

						<div class="form-group row">
							<label for="detalhes" class="col-md-4 col-form-label text-md-right">Detalhes</label>
							<div class="col-md-6">
								<textarea class="form-control" id="detalhes" name="detalhes" rows="3" value="" >{{ $jogo->detalhes }}</textarea>
							</div>
						</div>	

						<h4>Console</h4>				
                        <hr>
                        <div class="form-group row">
                            <label for="console_id" class="col-md-4 col-form-label text-md-right">Console</label>
                            <div class="col-md-6">
                                <select class="form-control" id="console_id" name="console_id" required>
                                    @foreach($consoles as $console)
                                        <option value="{{ $console->id }}" {{ (isset($jogo->console_id) && $jogo->console_id == $console->id ? 'selected' : '' ) }} >{{ $console->modelo }}</option>
                                    @endforeach                       
                                </select>
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
