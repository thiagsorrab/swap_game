@extends('layouts.app1')

@section('header')

	<h1>
	Troca Lista
	</h1>
	<ol class="breadcrumb">	
	<li class="active"><i class="fa fa-dashboard"></i> Troca</li>
	</ol>

@endsection

@section('content')
<div class="box">

	
	<div class="box-header">
		
		<h3 class="box-title">Lista de trocas</h3>

		<div class="box-tools">
			
			
		</div>
	</div>

	<!-- /.box-header -->
	<div class="box-body ">
		
		<div class="col-md-6">
			<!-- Custom Tabs -->
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab_1" data-toggle="tab">Trocas Recebidas</a></li>
					<li><a href="#tab_2" data-toggle="tab">Trocas Solicitadas</a></li>              					
				</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="tab_1">
					
					@foreach($trocasrecebidas as $tr)
					<div class="row">			
						@if ($tr->jogo2->imagem != null)
							<div class="widget-user-image" style="display: inline-block; float: left;">
								<img class="" src="{{ url('storage/jogos/'.$tr->jogo2->imagem) }}" alt="{{ $tr->jogo2->titulo }}" style="max-height: 70px;">
							</div>
						@endif
							<div class="widget-user-image" style="display: inline-block; float: left; margin-left: 50px; margin-top: 7px;">
								<i class="fa fa-fw fa-refresh" style="font-size: 50px"></i>
							</div>
						@if ($tr->jogo1->imagem != null)
							<div class="widget-user-image" style="display: inline-block; float: right;">
								<img class="" src="{{ url('storage/jogos/'.$tr->jogo1->imagem) }}" alt="{{ $tr->jogo1->titulo }}" style="max-height: 70px;">
							</div>
						@endif
						<div style="display: block; float: left; margin-top: 20px;">
							<p><b>Jogo: </b>{{ $tr->jogo2->titulo }}</p>
							<p><b>Console:</b> {{ $tr->jogo2->console->modelo }}</p>
							<p><b>Estado:</b> {{ $tr->jogo2->estado }}</p>
							<p><b>Detalhes:</b> {{ $tr->jogo2->detalhes }}</p>
							<p><b>Dono:</b> {{ $tr->jogo2->usuario->nome }}</p>
							<p><b>Telefone:</b> {{$tr->jogo2->usuario->telefone }}</p>
							@if($tr->status == 'Recusado')
								<b>Troca Recusada</b>
							@elseif ($tr->status != 'Finalizado')
								<button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modal-default{{ $tr->id }}">
									<span class="glyphicon glyphicon-refresh"></span>  Trocar
								</button>
								<a href="#" type="button" class="btn btn-block btn-primary"><i class="fa fa-fw fa-wechat"></i>  Chat</a>
							@else
								<b>Troca Finalizada</b>
							@endif
						</div>
						<hr>
						<div class="modal fade" id="modal-default{{ $tr->id }}">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title">Confirmar Troca</h4>
									</div>
									<div class="modal-body">										
										<form action="{{ route('troca.realiza',$tr->id) }}" method="post" style="float: right; margin-top: 15px;" >
											{{ csrf_field() }}
											<input type="hidden" name="_method" value="put">
											<input type="hidden" name="status" value="Finalizado">
											<input type="hidden" name="usuario_id1" value="{{ $tr->jogo1->usuario->id }}">
											<input type="hidden" name="usuario_id2" value="{{ $tr->jogo2->usuario->id }}">
											<input type="hidden" name="jogo_id1" value="{{  $tr->jogo1->id }}">
											<input type="hidden" name="jogo_id2" value="{{  $tr->jogo2->id }}">

											<div class="form-group row mb-0">
												<div class="col-md-6 offset-md-4">
													<button type="submit" class="btn btn-primary">
														<i class="fa fa-fw fa-check"></i> Trocar
													</button>
												</div>
											</div>

										</form>
										<form action="{{ route('troca.recusa',$tr->id) }}" method="post" style="float: left; margin-top: 15px;" >
											{{ csrf_field() }}
											<input type="hidden" name="_method" value="put">
											<input type="hidden" name="status" value="Recusado">
											<input type="hidden" name="usuario_id1" value="{{ $tr->jogo1->usuario->id }}">
											<input type="hidden" name="usuario_id2" value="{{ $tr->jogo2->usuario->id }}">
											<input type="hidden" name="jogo_id1" value="{{  $tr->jogo1->id }}">
											<input type="hidden" name="jogo_id2" value="{{  $tr->jogo2->id }}">

											<div class="form-group row mb-0">
												<div class="col-md-6 offset-md-4">
													<button type="submit" class="btn btn-danger">
														<i class="fa fa-fw fa-times"></i> Recusar Troca
													</button>
												</div>
											</div>

										</form>										
									</div>
									<div class="modal-footer">
									<!--<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
									<!--<button type="button" class="btn btn-primary">Save changes</button>-->
									</div>
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<!-- /.modal -->
					</div>
					@endforeach
				</div>
				<!-- /.tab-pane -->
				<div class="tab-pane" id="tab_2">
					@foreach($trocassolicitadas as $ts)
						<div class="row">
						@if ($ts->jogo1->imagem != null)
							<div class="widget-user-image" style="display: inline-block; float: left;">
								<img class="" src="{{ url('storage/jogos/'.$ts->jogo1->imagem) }}" alt="{{ $ts->jogo1->titulo }}" style="max-height: 70px;">
							</div>
						@endif
							<div class="widget-user-image" style="display: inline-block; float: left; margin-left: 50px; margin-top: 7px;">
								<i class="fa fa-fw fa-refresh" style="font-size: 50px"></i>
							</div>
						@if ($ts->jogo2->imagem != null)
							<div class="widget-user-image" style="display: inline-block; float: right;">
								<img class="" src="{{ url('storage/jogos/'.$ts->jogo2->imagem) }}" alt="{{ $ts->jogo2->titulo }}" style="max-height: 70px;">
							</div>
						@endif
						<div style="display: block; float: left; margin-top: 20px;">
							<p><b>Jogo: </b>{{ $ts->jogo1->titulo }}</p>
							<p><b>Console:</b> {{ $ts->jogo1->console->modelo }}</p>
							<p><b>Estado:</b> {{ $ts->jogo1->estado }}</p>
							<p><b>Detalhes:</b> {{ $ts->jogo1->detalhes }}</p>
							<p><b>Dono:</b> {{ $ts->jogo1->usuario->nome }}</p>
							<p><b>Telefone:</b> {{$ts->jogo1->usuario->telefone }}</p>
							<button type="button" class="btn btn-block  @if ($ts->status == 'Aguardando') disabled btn-warning @endif" data-toggle="modal" data-target="#modal-default">
								<span class="glyphicon glyphicon-refresh"></span>  {{ $ts->status }}
							</button>
							<a href="#" type="button" class="btn btn-block btn-primary"><i class="fa fa-fw fa-wechat"></i>  Chat</a>

						</div>
						<hr>
					</div>
					@endforeach
				</div>
				<!-- /.tab-pane -->              
			</div>
			<!-- /.tab-content -->
			</div>
			<!-- nav-tabs-custom -->
		</div>
		<!-- /.col -->
		
	</div>
	<!-- /.box-body -->
</div>
<!-- /.box -->
@endsection