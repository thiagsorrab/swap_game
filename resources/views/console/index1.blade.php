@extends('layouts.app1')

@section('header')

	<h1>
		Consoles		
	</h1>
	<ol class="breadcrumb">	
		<i class="fa fa-dashboard"></i><li class="active">Consoles</li>
	</ol>

@endsection

@section('content')
<div class="box">
	
	<a href="{{ route('console.adicionar') }}" type="button" class="btn btn-block btn-primary">Adicionar</a>
		
	
	<div class="box-header">
		<h3 class="box-title">Consoles</h3>

		<div class="box-tools">
			{!! $consoles->links() !!}
		</div>
	</div>
	<!-- /.box-header -->
	<div class="box-body no-padding">
		<table class="table">
			<tr>
				<th>#</th>
                <th>Modelo</th>                                
                <th>Ação</th>  
			</tr>
			@foreach($consoles as $console)
                <tr>
                    <th scope="row">{{ $console->id }}</th>
                    <td>{{ $console->modelo }}</td>                                    
                    <td>
                    <a href="{{ route('console.editar', $console->id) }}"><i class="fa fa-fw fa-user"></i></a>
                    <a href="javascript:(confirm('Deletar esse Registro?') ? window.location.href='{{route('console.deletar', $console->id)}}' : false)"><i class="fa fa-fw fa-trash"></i></a>
                    </td>
                </tr>                            
            @endforeach		
		</table>
	</div>
	<!-- /.box-body -->
</div>
<!-- /.box -->
@endsection