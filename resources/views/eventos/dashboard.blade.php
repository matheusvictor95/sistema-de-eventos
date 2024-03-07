@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
    <div class="col-md-10 offet-md-1 dashboard-title-container">
        <h1>Meus Eventos</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if (count($eventos) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
            
            <tbody>
                @foreach ($eventos as $evento)
                    <tr>
                        <td scope="row">{{ $loop->index+1 }}</td>
                        <td><a href="/eventos/{{$evento->id}}">{{$evento->titulo}}</a></td>
                        <td>0</td>
                        <td>
                            <a href="{{route('eventos.edit', $evento->id)}}" class="btn btn-info edit-btn"><ion-icon name ="create"></ion-icon>Editar</a> 
                            <form action="/eventos/{{$evento->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash"></ion-icon>Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>Voce ainda não tem eventos,<a href="{{ route('eventos.create') }}">criar evento</a></p>
        @endif
    </div>
@endsection
