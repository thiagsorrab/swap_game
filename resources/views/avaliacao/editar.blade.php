@extends('layouts.app1')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Avaliar</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form action="{{ route('avaliacao.atualizar',$avaliacao->id) }}" method="post">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="put">
					<div class="box-body">						
						<!-- radio -->
						<div class="form-group">
							<label>
								<span class="fa fa-fw fa-star"></span> 1
								@if ($avaliacao->nota == 1)
								<input type="radio" name="nota" value="1" class="minimal" checked="true">
								@else
								<input type="radio" name="nota" value="1" class="minimal" checked="false">
								@endif
								
							</label>
							<label>
								<span class="fa fa-fw fa-star"></span> 2
								@if ($avaliacao->nota == 2)
								<input type="radio" name="nota" value="2" class="minimal" checked="true">
								@else
								<input type="radio" name="nota" value="2" class="minimal" checked="false">
								@endif
								
							</label>
							<label>
								<span class="fa fa-fw fa-star"></span> 3
								@if ($avaliacao->nota == 3)
								<input type="radio" name="nota" value="3" class="minimal" checked="true">
								@else
								<input type="radio" name="nota" value="3" class="minimal" checked="false">
								@endif
								
							</label>
							<label>
								<span class="fa fa-fw fa-star"></span> 4
								@if ($avaliacao->nota == 4)
								<input type="radio" name="nota" value="4" class="minimal" checked="true">
								@else
								<input type="radio" name="nota" value="4" class="minimal" checked="false">
								@endif
								
							</label>
							<label>
								<span class="fa fa-fw fa-star"></span> 5
								@if ($avaliacao->nota == 5)
								<input type="radio" name="nota" value="5" class="minimal" checked="true">
								@else
								<input type="radio" name="nota" value="5" class="minimal" checked="false">
								@endif
								
							</label>
						</div>
						<div class="form-group">
							<label for="avaliacao_user">Avaliação</label>							
							<textarea name="avaliacao_user" class="form-control" id="avaliacao_user" placeholder="Sua Avaliação" >{{$avaliacao->avaliacao_user}}</textarea>
						</div>
						<input type="hidden" name="usuario_id_avaliado" value="{{$avaliacao->usuario_id_avaliado}}">
						<input type="hidden" name="usuario_id_avaliador" value="{{Auth::user()->id}}">
						<input type="hidden" name="troca_id" value="{{$avaliacao->troca_id}}">
					</div>
					<!-- /.box-body -->

					<div class="box-footer">
					<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
				</form>
			</div>
			<!-- /.box -->


		</div>
	</div>
</div>
@endsection

