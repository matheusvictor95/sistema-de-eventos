<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\User;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index(){
       
        $search = request('search');
        if ($search) {
            $eventos = Evento::where([
                ['titulo', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $eventos = Evento::all();
        }
        return view ('welcome',['eventos' => $eventos, 'search' => $search]);
    }

    public function create(){
        return view ('eventos.create');
    }
    public function store(Request $request){
        $evento = new Evento;
        $evento->titulo = $request->titulo;
        $evento->cidade = $request->cidade;
        $evento->descricao = $request->descricao;
        $evento->privado = $request->privado;
        $evento->items = $request->items;
        $evento->date = $request->date;

        //Imagem Upload
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/eventos'), $imageName);
            $evento->image = $imageName;
        }

            $user = auth()->user();
            $evento->user_id = $user->id;

        $evento->save();
        return redirect('/')->with('msg','evento criado com sucesso!' );
    }

    public function show($id){
        $evento = Evento::findOrFail($id);
        $donoevento = User::where('id', $evento->user_id)->first()->toArray();
        return view('eventos.show', ['evento'=> $evento, 'donoevento' => $donoevento]);
    }

    public function dashboard(){
        $user = auth()->user();
        $eventos = $user->events;

        return view ('eventos.dashboard', ['eventos' => $eventos]);
    }

    public function destroy($id){
        Evento::findOrFail($id)->delete();
        return redirect()->route('eventos.dashboard')->with('msg','Evento deletado!');
    }
}
