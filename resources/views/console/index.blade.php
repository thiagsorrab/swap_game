@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb"> 
                        <li class="breadcrumb-item active" aria-current="page">Consoles</li>
                    </ol>
                </nav>

                <div class="card-body">
                    <p>
                        <a class="btn btn-info" href="{{ route('console.adicionar') }}">Adicionar</a>
                    </p>                    

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Modelo</th>                                
                                <th>Ação</th>                 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($consoles as $console)
                                <tr>
                                    <th scope="row">{{ $console->id }}</th>
                                    <td>{{ $console->modelo }}</td>                                    
                                    <td>
                                    <a href="{{ route('console.editar', $console->id) }}"><i class="fas fa-user-edit"></i></a>
                                    <a href="javascript:(confirm('Deletar esse Registro?') ? window.location.href='{{route('console.deletar', $console->id)}}' : false)"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>                            
                            @endforeach
                            
                        </tbody>
                        
                    </table>

                    <div align="center">
                        {!! $consoles->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
