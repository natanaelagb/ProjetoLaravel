@extends("layouts.main")

@section("title", $event['title'])

@section("content")
<section id="single-event">
    <div class="container">
        <div class="row my-3">
            <div class="col-sm-7  mb-5">
                <img src="/img/events/{{$event['image']}}">
            </div>

            <div id="info-event" class="col-sm-5 ">
                <h2 class="display-6 fs-3 mb-3">{{$event['title']}}</h2>
                <p class="mb-0"><ion-icon name="location-outline"></ion-icon> {{$event['city']}}</p>
                <p class="mb-0"><ion-icon name="people-outline"></ion-icon> * Participantes</p>
                <p class="mb-0"><ion-icon name="star-outline"></ion-icon> Dono do evento</p>
               
                <div class="mt-4 mb-4">
                    <h3 class="fs-5">O evento conta com:</h3>
                    <ul id="list-items">
                        @foreach($event['items'] as $items => $value)
                        <li><ion-icon name="play-outline"></ion-icon>  {{$value}}</li>
                        @endforeach
                    </ul>
                </div>

                <button type="button" class="btn btn-primary">Confirmar Presença</button>

            </div>
        </div>
        <hr>
        <div class="row">
            <h2 class="display-6 fs-2">Descrição do evento:</h2>
            <p id="description">{{$event['description']}} </p>
        </div>
    </div>
</section>
@endsection("content")