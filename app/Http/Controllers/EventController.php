<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\File; 

class EventController extends Controller
{
    public function index(){

        $search = request("search");

        if($search){
            $events = Event::where("title", "like", "%$search%")
            ->orwhere("description", "like", "%$search%")
            ->get();
        }else{
            $events = Event::all();
        }

        return view('welcome', ["events" => $events, "search" => $search]);
    }

    public function create(){
        return view("events.create");
    }

    public function store(Request $request){
        $event = new Event();

        $event->title          = $request->title;
        $event->description    = $request->description;
        $event->city           = $request->city;
        $event->private        = $request->private;
        $event->items          = $request->items;
        $event->date           = $request->date;

        if($request->hasFile("image") && $request->file("image")->isValid()){

            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path("img/events"), $imageName);

            $event->image = $imageName;
        }

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect("/")->with('msg', 'Evento criado com sucesso! '.$request->date);
    }

    public function show($id){

        $event = Event::findOrFail($id);

        $eventOwner = User::where("id", $event->user_id)->first()->toArray();

        return view("events.show", ["event" => $event, "eventOwner" => $eventOwner]);
    }


    public function destroy($id){
        $event = Event::findOrFail($id);
        File::delete("img/events/".$event['image']);
        $event->delete();
        return redirect("/painel")->with("msg", "Evento deletado com sucesso!");
    }


    public function edit($id){
        $event = Event::findOrFail($id);
        return view("events.edit", ["event" => $event]);
    }


    public function update(Request $request){
        $data = $request->all();
        $event= Event::findOrFail($request->id);

        if($request->hasFile("image") && $request->file("image")->isValid()){

            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path("img/events"), $imageName);

            File::delete("img/events/".$event['image']);

            $data['image'] = $imageName;
        }

        $event->update($data);

        return redirect("/dashboard")->with("msg", "Evento editado com sucesso!");
    }


    public function dashboard(){ 
        $user = auth()->user();
        $events = $user->events;

        return view("dashboard", ["user" => $user, "events" => $events]);
    }

    public function eventJoin($id){

        $user = auth()->user();

        $user->eventsAsParticipant()->attach($id);

        $event = Event::findOrFail($id);

        return redirect("/")->with("msg", "Sua presença está confirmada no evento: " . $event->title);

    }
}
