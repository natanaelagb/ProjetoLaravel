<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use Illuminate\Console\Scheduling\EventMutex;
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

        return redirect("/")->with('msg', 'Evento criado com sucesso!');
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

    public function dashboard(){
        
        $user = auth()->user();

        $events = $user->events;

        return view("dashboard", ["user" => $user, "events" => $events]);
    }
}
