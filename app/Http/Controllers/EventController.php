<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    //a rota principal da aplicação
    public function index(){
        
        //$events = Event::all();

        //$events = Event::all();
        /*
        $event1 = ['title'=>"nome evento 1"];
        $event2 = ['title'=>"nome evento 2"];
        $events = ["nome evento 1", "nome evento 2"];
        */
        $events = Event::all();

        return view('welcome', ['events'=>$events], );
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){

        $event = new Event;
        $event->title = $request->title;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso');
    }
}
