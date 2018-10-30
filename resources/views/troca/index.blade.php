@extends('layouts.app1')

@section('header')

	<h1>
	Troca
	</h1>
	<ol class="breadcrumb">	
	<li class="active"><i class="fa fa-dashboard"></i> Troca</li>
	</ol>

@endsection

@section('content')
<div class="box">

	
	<div class="box-header">
		@if ($jogo1->imagem != null)
			<div class="widget-user-image" style="display: inline-block;">
				<img class="" src="{{ url('storage/jogos/'.$jogo1->imagem) }}" alt="{{ $jogo1->titulo }}" style="max-width: 128px;">
			</div>
		@endif
		<h3 class="box-title">{{ $jogo1->titulo }}</h3>

		<div class="box-tools">
			
			
		</div>
	</div>

	<!-- /.box-header -->
	<div class="box-body ">
		
			<p><b>Console:</b> {{ $jogo1->console->modelo }}</p>
			<p><b>Estado:</b> {{ $jogo1->estado }}</p>
			<p><b>Detalhes:</b> {{ $jogo1->detalhes }}</p>
			<p><b>Dono:</b> {{ $jogo1->usuario->nome }}</p>
			<p><b>Telefone:</b> {{ $jogo1->usuario->telefone }}</p>

			<button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modal-default">
                <span class="glyphicon glyphicon-refresh"></span>  Trocar
            </button>
			<a href="#" type="button" class="btn btn-block btn-primary"><i class="fa fa-fw fa-wechat"></i>  Chat</a>

			<div class="modal fade" id="modal-default">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title">Escolha um jogo seu</h4>
						</div>
						<div class="modal-body">
							@foreach($seusjogos as $jogo)
								@if ($jogo->statustroca != "Trocado")
									<div class="row">
										@if ($jogo->imagem != null)
											<div class="widget-user-image" style="display: inline-block;">
												<img class="" src="{{ url('storage/jogos/'.$jogo->imagem) }}" alt="{{ $jogo->titulo }}" style="max-width: 50px;">
											</div>
										@endif
										<p style="display: inline-block;">{{ $jogo->titulo }}<br>{{ $jogo->console->modelo }}</p>
										<form action="{{ route('troca.inicio') }}" method="post" style="float: right; margin-top: 15px;" >
											{{ csrf_field() }}

											<input type="hidden" name="status" value="Aguardando">
											<input type="hidden" name="usuario_id1" value="{{ $jogo1->usuario->id }}">
											<input type="hidden" name="usuario_id2" value="{{ Auth::user()->id }}">
											<input type="hidden" name="jogo_id1" value="{{ $jogo1->id }}">
											<input type="hidden" name="jogo_id2" value="{{ $jogo->id }}">

											<div class="form-group row mb-0">
												<div class="col-md-6 offset-md-4">
													<button type="submit" class="btn btn-primary">
														<i class="fa fa-fw fa-check"></i> Trocar
													</button>
												</div>
											</div>
											
										</form>
										<!--<span style="float: right;"><a href="#" ><i class="fa fa-fw fa-check"></i></a></span>-->
									</div>
								@endif
							@endforeach
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
							<!--<button type="button" class="btn btn-primary">Save changes</button>-->
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
		
	</div>
	<!-- /.box-body -->
</div>
<!-- /.box -->
@endsection