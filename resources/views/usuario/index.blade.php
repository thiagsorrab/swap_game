@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"> 
                        <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                    </ol>
                </nav>

                <div class="card-body">
                    <p>
                        <a class="btn btn-info" href="{{route('usuario.adicionar')}}">Adicionar</a>
                    </p>                    

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <!--<th>#</th>-->
                                <th>Nome</th>
                                <th>Data Nascimento</th>
                                <th>Genero</th>
                                <th>Telefone</th>
                                <th>E-mail</th>
                                <th>Ação</th>                 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <!--<th scope="row">{{ $usuario->id }}</th>-->
                                    <td>{{ $usuario->nome }}</td>
                                    <td>{{ $usuario->data_nascimento }}</td>
                                    <td>{{ $usuario->genero }}</td>
                                    <td>{{ $usuario->telefone }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                    <a href="{{ route('usuario.editar', $usuario->id) }}"><i class="fas fa-user-edit"></i></a>
                                    <a href="javascript:(confirm('Deletar esse Registro?') ? window.location.href='{{route('usuario.deletar', $usuario->id)}}' : false)"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>                            
                            @endforeach
                            
                        </tbody>
                        
                    </table>

                    <div align="center">
                        {!! $usuarios->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
