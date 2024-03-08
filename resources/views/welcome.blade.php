@extends('layouts.main')
@section('title', "Eventos")
    @section('content')
   
   <div id="search-container" class="col-md-12">
    <h1>Busque um Evento</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
   </div>
   <div id="events-container" class="col-md-12">
    @if ($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else 
    <h2>Próximos Eventos</h2>
    <p class="subtitle">Veja os eventos dos próximos dias</p> 
    @endif
    
    <div id="cards-container" class="row">
        @foreach ($eventos as $evento)
            <div class="card col-md-3">
                <img src="/img/eventos/{{$evento->image}}" alt="{{$evento->titulo}}">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/Y', strtotime($evento->date)) }}</p>
                    <h5 class="card-title">{{$evento->titulo}}</h5>
                    <p class="card-participants">{{count($evento->users)}}</p>
                    <a href="{{route('eventos.show', $evento->id)}}" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
        @endforeach
        @if(count($eventos) == 0 && $search)
        <p>não foi possível encontrar nenhum evento com {{ $search }} <a href="{{ route('eventos.index') }}">Ver todos!</a></p>
        @elseif(count($eventos) == 0)
        <p>Não há eventos disponíveis</p>
        @endif
    </div>
   </div>
@endsection

      
     


  
