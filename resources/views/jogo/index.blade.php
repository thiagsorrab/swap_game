@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"> 
                        <li class="breadcrumb-item active" aria-current="page">Jogos</li>
                    </ol>
                </nav>

                <div class="card-body">
                    <p>
                        <a class="btn btn-info" href="{{ route('jogo.adicionar') }}">Adicionar</a>
                    </p>                    

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titulo</th>
                                <th>Estado</th>
                                <th>Console</th>                            
                                <th>Ação</th>                 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jogos as $jogo)
                                <tr>
                                    <th scope="row">{{ $jogo->id }}</th>
                                    <td>{{ $jogo->titulo }}</td>                                    
                                    <td>{{ $jogo->estado }}</td> 
                                    <td>{{ $jogo->console->modelo }}</td> 
                                    <td>
                                    <a href="{{ route('jogo.editar', $jogo->id) }}"><i class="fas fa-user-edit"></i></a>
                                    <a href="javascript:(confirm('Deletar esse Registro?') ? window.location.href='{{route('jogo.deletar', $jogo->id)}}' : false)"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>                            
                            @endforeach
                            
                        </tbody>
                        
                    </table>

                    <div align="center">
                        {!! $jogos->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
