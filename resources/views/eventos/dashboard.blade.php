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
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td><a href="/eventos/{{ $evento->id }}">{{ $evento->titulo }}</a></td>
                            <td>{{ count($evento->users) }}</td>
                            <td>
                                <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-info edit-btn"><ion-icon
                                        name ="create"></ion-icon>Editar</a>
                                <form action="/eventos/{{ $evento->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn"><ion-icon
                                            name="trash"></ion-icon>Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Voce ainda não tem eventos, <a href="{{ route('eventos.create') }}">criar evento</a></p>
        @endif
    </div>
    <div class="col-md-10 offet-md-1 dashboard-title-container">
        <h1>Eventos que estou participando</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if (is_countable($eventsAsParticipant) > 0)
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
                @foreach ($eventsAsParticipant as $evento)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td><a href="/eventos/{{ $evento->id }}">{{ $evento->titulo }}</a></td>
                        <td>{{ count($evento->users) }}</td>
                        <td>
                            <form action="{{route('eventos.leave', $evento->id)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger delete-btn">
                                    <ion-icon name="trash"></ion-icon>Sair do Evento
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else:
            <p>Você ainda não está participando de nenhum evento, <a href="/">veja todos os eventos</a></p>
        @endif
    </div>
@endsection
