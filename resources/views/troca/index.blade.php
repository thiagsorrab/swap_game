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

            <style>

				.nota{ /* elemento que terá todas as estrelas dentro*/
				display:block; /* usar inline-block pra exibir na mesma linha*/
				width:130px; /*definindo largura do elemento (soma da largura das 5 estrelas)*/
				height:21px; /* definindo altura do elemento, altura de apenas uma estrela*/
				background: #ccc url({{ asset('admintemplate/dist/img/bar.png') }}) repeat-y; /* definindo que a estrela apagada tem a cor #76003A e a estrela acesa tem a linha como imagem de fundo repetida na vertical até o fim do elemento*/
				}

				/*.nota:hover{ /* quando o mouse estiver sobre o elemento, todas estrelas "acenderão"*
				background-position:0px 0px !important;
				}*/

				.nota i{ /* este elemento terá a mesma largura e altura do seu pai(.nota), com uma diferença na imagem de fundo*/
				display: block;
				width: 130px;
				height: 100%;
				background: url({{ asset('admintemplate/dist/img/moldura_estrela_b.png') }}) repeat-x; /* este elemento tem as molduras das estrelas, repetindo-se horizontalmente*/
				}

				/* Se parássemos o código nesse ponto, teríamos a avaliação atual e ao passar o mouse sobre qualquer estrela, todas as outras acenderiam... */

				.nota a:link{ /* este será um "link invisível", que detectara o mouse*/
				display:block;
				float:left;
				width:20%;
				opacity:0; /* esta linha que faz o link e seu conteúdo não aparecer, porém ele continua existindo e pode ser clicado...*/
				}

				.nota img{ /* dentro de cada link invisível há uma imagem de moldura de estrela, com o fundo apagado*/
				width:100%;
				height:auto;
				background:#ccc; /* esta cor de background é a cor da estrela com fundo apagado*/
				}

				/*.nota>i>a:hover ~ a:link{
				opacity:1;
				}*/
			</style>

			<h2>Avaliações</h2>
			<h5>do  {{ $jogo1->usuario->nome }}</h5>
			<h3>Média: {{ number_format($avaliacoes->media, 2) }}</h3>
			
			<span class="nota" style="background-position:{{$avaliacoes->tamanhoestrela}}px 0; margin-bottom: 20px; ">
				<i>
					<a href="#"><img src="{{ asset('admintemplate/dist/img/moldura_estrela_b.png') }}"></a>
					<a href="#"><img src="{{ asset('admintemplate/dist/img/moldura_estrela_b.png') }}"></a>
					<a href="#"><img src="{{ asset('admintemplate/dist/img/moldura_estrela_b.png') }}"></a>
					<a href="#"><img src="{{ asset('admintemplate/dist/img/moldura_estrela_b.png') }}"></a>
					<a href="#"><img src="{{ asset('admintemplate/dist/img/moldura_estrela_b.png') }}"></a>
				</i>
			</span>
			<div class="box-footer box-comments">
			@foreach($avaliacoes as $avaliacao)

				
					<div class="box-comment">					

						<div class="comment-text" style="margin-left: 0px;">
							<span class="username">
								{{ $avaliacao->usuarioAvaliador->nome }}
								<span class="text-muted pull-right">{{ $avaliacao->updated_at->format('d M Y H:i:s') }}</span>
							</span><!-- /.username -->
							{{ $avaliacao->avaliacao_user  }}
						</div>
						<!-- /.comment-text -->
					</div>					
				

				<!-- /.box-footer -->

			@endforeach
			</div>

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