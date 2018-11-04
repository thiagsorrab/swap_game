@extends('layouts.app1')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<!-- DIRECT CHAT PRIMARY -->
			<div class="box box-primary direct-chat direct-chat-primary">
				<div class="box-header with-border">
					<h3 class="box-title">{{ $chat->troca->jogo1->titulo }} por {{ $chat->troca->jogo2->titulo }}</h3>

					<div class="box-tools pull-right">
						<!--<span data-toggle="tooltip" title="3 New Messages" class="badge bg-light-blue">3</span>
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>-->
						<button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Troca" data-widget="chat-pane-toggle">
						<i class="glyphicon glyphicon-refresh"></i></button>
						<!--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<!-- Conversations are loaded here -->
					
					



					


					<div id="div1" class="direct-chat-messages">
						<!-- Message. Default to the left -->
						@foreach($chat->mensagems as $msg)
							<div class='direct-chat-msg @if ($msg->usuario->id == Auth::user()->id) right @endif '>
								<div class="direct-chat-info clearfix">
									<span class="direct-chat-name  @if ($msg->usuario->id == Auth::user()->id)  pull-right @else pull-left  @endif ">{{ $msg->usuario->nome }}</span>
									<span class="direct-chat-timestamp @if ($msg->usuario->id == Auth::user()->id)  pull-left @else pull-right  @endif">{{$msg->created_at->format('d M Y H:i:s')}}</span>
								</div>
								<!-- /.direct-chat-info -->
								<img class="direct-chat-img" src="{{ asset('admintemplate/dist/img/male-avatar-160x160.png') }}" alt="Message User Image"><!-- /.direct-chat-img -->
								<div class="direct-chat-text">
									{{ $msg->msg }}
								</div>
								<!-- /.direct-chat-text -->
							</div>
							<!-- /.direct-chat-msg -->
						@endforeach
						


					</div>
					<!--/.direct-chat-messages-->

					<!-- Contacts are loaded here -->
					<div class="direct-chat-contacts">
						<div class="row">		
							<div class="col-md-12">
							@if ($chat->troca->jogo2->imagem != null)
								<div class="widget-user-image" style="display: inline-block; float: left; margin-left: 20px;">
									<img class="" src="{{ url('storage/jogos/'.$chat->troca->jogo2->imagem) }}" alt="{{ $chat->troca->jogo2->titulo }}" style="max-height: 70px;">
								</div>
							@endif
								<div class="widget-user-image" style="display: inline-block; float: left; margin-left: 50px; margin-top: 7px;">
									<i class="fa fa-fw fa-refresh" style="font-size: 50px"></i>
								</div>
							@if ($chat->troca->jogo1->imagem != null)
								<div class="widget-user-image" style="display: inline-block; float: right; margin-right: 20px;">
									<img class="" src="{{ url('storage/jogos/'.$chat->troca->jogo1->imagem) }}" alt="{{ $chat->troca->jogo1->titulo }}" style="max-height: 70px;">
								</div>
							@endif
							<div style="display: block; float: left; margin-top: 20px;">
								<p><b>Jogo: </b>{{ $chat->troca->jogo2->titulo }}</p>
								<p><b>Console:</b> {{ $chat->troca->jogo2->console->modelo }}</p>								
								<p><b>Dono:</b> {{ $chat->troca->jogo2->usuario->nome }}</p>
								<p><b>Telefone:</b> {{$chat->troca->jogo2->usuario->telefone }}</p>
								@if($chat->troca->status == 'Recusado')
									<b>Troca Recusada</b>
								@elseif ($chat->troca->status != 'Finalizado')
									@if($chat->troca->usuario2->id ==  Auth::user()->id )
										<button type="button" class="btn btn-block  @if ($chat->troca->status == 'Aguardando') disabled btn-warning @endif" data-toggle="modal" data-target="#modal-default">
											<span class="glyphicon glyphicon-refresh"></span>  {{ $chat->troca->status }}
										</button>
									@else
									<button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#modal-default{{ $chat->troca->id }}">
										<span class="glyphicon glyphicon-refresh"></span>  Trocar
									</button>				
									@endif					
								@else
									<b>Troca Finalizada</b>
								@endif
							</div>
							<hr>


							


						</div>
					</div>
					</div>
					<!-- /.direct-chat-pane -->
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<form action="{{ route('chat.enviar') }}" method="post">
						<div class="input-group">
							{{ csrf_field() }}
							<input type="text" name="msg" placeholder="Digite a mensagem ..." class="form-control">
							<input type="hidden" name="usuario_id" value="{{Auth::user()->id}}">
							<input type="hidden" name="chat_id" value="{{$chat->id}}">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-primary btn-flat">Enviar</button>
							</span>
						</div>
					</form>
				</div>
				<!-- /.box-footer-->

				<div class="modal fade" id="modal-default{{ $chat->troca->id }}">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title">Confirmar Troca</h4>
										</div>
										<div class="modal-body">										
											<form action="{{ route('troca.realiza',$chat->troca->id) }}" method="post" style="float: right; margin-top: 15px;" >
												{{ csrf_field() }}
												<input type="hidden" name="_method" value="put">
												<input type="hidden" name="status" value="Finalizado">
												<input type="hidden" name="usuario_id1" value="{{ $chat->troca->jogo1->usuario->id }}">
												<input type="hidden" name="usuario_id2" value="{{ $chat->troca->jogo2->usuario->id }}">
												<input type="hidden" name="jogo_id1" value="{{  $chat->troca->jogo1->id }}">
												<input type="hidden" name="jogo_id2" value="{{  $chat->troca->jogo2->id }}">

												<div class="form-group row mb-0">
													<div class="col-md-6 offset-md-4">
														<button type="submit" class="btn btn-primary">
															<i class="fa fa-fw fa-check"></i> Trocar
														</button>
													</div>
												</div>

											</form>
											<form action="{{ route('troca.recusa',$chat->troca->id) }}" method="post" style="float: left; margin-top: 15px;" >
												{{ csrf_field() }}
												<input type="hidden" name="_method" value="put">
												<input type="hidden" name="status" value="Recusado">
												<input type="hidden" name="usuario_id1" value="{{ $chat->troca->jogo1->usuario->id }}">
												<input type="hidden" name="usuario_id2" value="{{ $chat->troca->jogo2->usuario->id }}">
												<input type="hidden" name="jogo_id1" value="{{  $chat->troca->jogo1->id }}">
												<input type="hidden" name="jogo_id2" value="{{  $chat->troca->jogo2->id }}">

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
			<!--/.direct-chat -->
		</div>
	</div>
</div>
@endsection

@section('post-script')
<script type="text/javascript">
	$('#div1').scrollTop($('#div1')[0].scrollHeight);
	//$("#div1").animate({ scrollTop: $('#div1').prop("scrollHeight")}, 1000);
</script>

@endsection          