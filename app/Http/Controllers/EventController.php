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

        $search = request('search');

        if($search){
            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $events = Event::all();
        }

        //$events = Event::all();

        return view('welcome', ['events'=>$events, 'search' => $search], );
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){

        $event = new Event;
        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;

        echo "passou aqui 0";
        print "passou aqui 0";
        //image upload
        if($request->hasfile('image') && $request->file('image')->isValid()){
            echo "passou aqui 1";
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            echo "passou aqui 2";
            //monta a imagem
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage -> move(public_path('img/events'),$imageName);
            echo "passou aqui 3";
            //salva o caminho da imagem
            $event->image = $imageName;
        }

        $event->save();

        return redirect('/')->with('msg', 'Evento criado com sucesso');
    }

    public function show($id){
        $event = Event::findOrFail($id);
        return view('events.show',  ['event' =>$event]);
    }

}
