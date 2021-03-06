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

        return redirect("/")->with('msg', 'Evento criado com sucesso!');
    }

    public function show($id){

        $user = auth()->user();
        $hasUserJoin = false;

        if($user){
            
            $userEvents = $user->eventsAsParticipant->toArray();

            foreach ($userEvents as $key) {
                if($key['id'] == $id){
                    $hasUserJoin = true;
                }
            }
        }

        $event = Event::findOrFail($id);
        
        $eventOwner = User::where("id", $event->user_id)->first()->toArray();

        return view("events.show", ["event" => $event, "eventOwner" => $eventOwner, "hasUserJoin" => $hasUserJoin]);
    }


    public function destroy($id){

        $authUser = auth()->user();
        $event = Event::findOrFail($id);

        if($event['user_id'] == $authUser->id){
            File::delete("img/events/".$event['image']);
            $event->delete();
            return redirect("/dashboard")->with("msg", "Evento deletado com sucesso!");
        }else{
            return redirect("/dashboard");
        }
    
    }


    public function edit($id){
        
        $authUser = auth()->user();
        $event = Event::findOrFail($id);

        if($event['user_id'] == $authUser->id){
            return view("events.edit", ["event" => $event]);
        }else{
            return redirect("/dashboard");
        }

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

        return redirect("/")->with("msg", "Sua presen??a est?? confirmada no evento: " . $event->title);

    }

    public function eventLeave($id){
        $user = auth()->user();

        $user->eventsAsParticipant()->detach($id);

        $event = Event::findOrFail($id);

        return redirect("/")->with("msg", "Sua participa????o foi cancelada no evento: " . $event->title);
    }
}
