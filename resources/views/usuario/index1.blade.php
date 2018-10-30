@extends('layouts.app1')

@section('header')

	<h1>
	Usuarios
	</h1>
	<ol class="breadcrumb">	
	<li class="active"><i class="fa fa-dashboard"></i> Usuarios</li>
	</ol>

@endsection

@section('content')
<div class="box">

	<a href="{{route('usuario.adicionar')}}" type="button" class="btn btn-block btn-primary">Adicionar</a>

	<div class="box-header">
		<h3 class="box-title">Usuarios</h3>

		<div class="box-tools">
			{!! $usuarios->links() !!}
		</div>
	</div>
	<!-- /.box-header -->
	<div class="box-body no-padding">
		<table class="table">
			<tr>
				<th>Nome</th>
                <!--<th>Data Nascimento</th>
                <th>Genero</th>
                <th>Telefone</th>-->
                <th>E-mail</th>
                <th>Ação</th>  
			</tr>
			@foreach($usuarios as $usuario)
                <tr>
                    <!--<th scope="row">{{ $usuario->id }}</th>-->
                    <td>{{ $usuario->nome }}</td>
                    <!--<td>{{ $usuario->data_nascimento }}</td>
                    <td>{{ $usuario->genero }}</td>
                    <td>{{ $usuario->telefone }}</td>-->
                    <td>{{ $usuario->email }}</td>
                    <td>
                    <a href="{{ route('usuario.editar', $usuario->id) }}"><i class="fa fa-fw fa-user"></i></a>
                    <a href="javascript:(confirm('Deletar esse Registro?') ? window.location.href='{{route('usuario.deletar', $usuario->id)}}' : false)"><i class="fa fa-fw fa-trash"></i></a>
                    </td>
                </tr>                            
            @endforeach			
		</table>
	</div>
	<!-- /.box-body -->
</div>
<!-- /.box -->
@endsection