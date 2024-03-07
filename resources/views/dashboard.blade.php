@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
    <div class="col-md-10 offet-md-1 dashboard-title-container">
        <h1>Meus Eventos</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if (count($eventos) > 0)
            @else 
            <p>Voce ainda não tem eventos,<a href="{{route('eventos.create')}}">criar evento</a></p>
        @endif
    </div>
@endsection
