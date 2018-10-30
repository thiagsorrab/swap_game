@extends('layouts.app1')

@section('header')

	<h1>
		Jogos		
	</h1>
	<ol class="breadcrumb">	
		<i class="fa fa-dashboard"></i><li class="active">Jogos</li>
	</ol>

@endsection

@section('content')
<div class="box">
	
	<a href="{{ route('jogo.adicionar') }}" type="button" class="btn btn-block btn-primary">Adicionar</a>
		
	
	<div class="box-header">
		<h3 class="box-title">Jogos</h3>

		<div class="box-tools">
			{!! $jogos->links() !!}
		</div>
	</div>
	<!-- /.box-header -->
	<div class="box-body no-padding">		
			@foreach($jogos as $jogo)
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="info-box bg-aqua">
						<span class="info-box-icon">
							@if ($jogo->imagem != null)
								<img src="{{ url('storage/jogos/'.$jogo->imagem) }}" alt="{{ $jogo->titulo }}" style="max-width: 71%;">
							@endif
						</span>

						<div class="info-box-content">
							<span class="info-box-text">{{ $jogo->titulo }}</span>
							<span class="info-box-number">{{ $jogo->console->modelo }}</span>
							<!--
							<div class="progress">
								<div class="progress-bar" style="width: 70%"></div>
							</div>-->
							<span class="progress-description">
								{{ $jogo->estado }}								
							</span>
							@if ($jogo->statustroca != 'Trocado')
								@if ($jogo->usuario_id == Auth::user()->id)
								<span style="float: right;">
									<a style="color: #ff0c0c;" href="{{ route('jogo.editar', $jogo->id) }}"><i class="fa fa-fw fa-user"></i></a>
	                    			<a style="color: #ff0c0c;" href="javascript:(confirm('Deletar esse Registro?') ? window.location.href='{{route('jogo.deletar', $jogo->id)}}' : false)"><i class="fa fa-fw fa-trash"></i></a>
								</span>
								@else
								<span style="float: right;">
									<a style="color: #ff0c0c;" href="{{ route('troca.index', $jogo->id) }}"><span class="glyphicon glyphicon-refresh"></span></a>                    			
								</span>
								@endif
							@else
								<span style="float: right;">
									Jogo já trocado                    			
								</span>
							@endif
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>

                                            
            @endforeach				
	</div>
	<!-- /.box-body -->
</div>
<!-- /.box -->
@endsection