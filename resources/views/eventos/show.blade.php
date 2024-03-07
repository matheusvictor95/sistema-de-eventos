@extends('layouts.main')
@section('title', $evento->titulo)
@section('content')
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/eventos/{{ $evento->image }}" class="img-fluid" alt="{{ $evento->title }}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $evento->titulo }}</h1>
                <p class="event-city"><ion-icon name="pin"></ion-icon>{{ $evento->cidade }}</p>
                <p class="events-participants"><ion-icon name="contacts"></ion-icon>X participantes</p>
                <p class="events-owner"><ion-icon name="star-outline"></ion-icon>Dono do Evento</p>
                <a href="" class="btn btn-primary" id="event-submit">Confirmar Presença</a>
                @if(isset($evento->items))
                <h3>O evento conta com:</h3>
                <ul id="items-list">
                    @foreach ($evento->items as $item )
                        <li><ion-icon name ="arrow-forward"></ion-icon><span>{{$item}}</span></li>
                    @endforeach
                </ul>
                @endif
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Sobre o evento:</h3>
                <p class="event-description">{{$evento->descricao}}</p>
            </div>
        </div>
    </div>
@endsection
