@extends('layouts.main')
@section('title','Criar Evento')
@section('content')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie o seu Evento</h1>
        <form action="{{route('eventos.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Imagem do Evento:</label>
               <input type="file" id="image" name="image" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="title">Evento:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nome do evento">
            </div>
            <div class="form-group">
                <label for="date">Data do evento:</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="title">Cidade:</label>
                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Local do evento">
            </div>
            <div class="form-group">
                <label for="title">O evento é privado?</label>
               <select name ="privado" id="privado" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
               </select>
            </div>
            <div class="form-group">
                <label for="title">Descrição:</label>
                <textarea name="descricao" id="descricao" class="form-control" placeholder="o que vai acontecer no evento?"></textarea>
            </div>
            <div class="form-group">
                <label for="title">Adicione itens de infraestrutura:</label>
               <div class="form-group">
                <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
               </div>
               <div class="form-group">
                <input type="checkbox" name="items[]" value="Palco"> Palco
               </div>
               <div class="form-group">
                <input type="checkbox" name="items[]" value="Cerveja grátis"> Cerveja grátis
               </div>
               <div class="form-group">
                <input type="checkbox" name="items[]" value="Open food"> Open food
               </div>
               <div class="form-group">
                <input type="checkbox" name="items[]" value="Brindes"> Brindes
               </div>
            </div>
            <br>
            <input type="submit" class="btn btn-primary" value="Criar Evento">
        </form>
    </div>
@endsection   