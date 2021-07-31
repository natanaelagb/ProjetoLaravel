@extends("layouts.main")

@section("title", "HDC Events")

@section("content")

<section id="search-container">
    <div class="overlay"></div>
    <div class="w-50">
        <h2 class="display-6">Busque um evento</h2>
        <form action="/" class="d-flex" method="GET">
            <input type="text" id="search" name="search" placeholder="Pesquisar...">
            <button type="submit" class="bg-primary" id="button-search"><ion-icon name="search"></ion-icon></button>
        </form>
    </div>
</section>

<section id="events-container" class="mt-4">
    <div class="container">
        @if($search)
            <h2 class="display-6">Busca por: {{$search}}</h2>
        @else
            <h2 class="display-6">Próximos Eventos</h2>
            <p class="fs-5 text-secondary">Veja os eventos nos próximos dias</p>
        @endif
        <div class="row">
            @foreach($events as $key)
            <div class="col-md-4 p-2">
                <div class="card  single-event shadow-sm">
                    <div class="event-image">
                        <img src="/img/events/{{$key['image']}}" >
                    </div>
                    
                    <div class="card-body">
                        <p>{{ date("d/m/Y H:i:s", strtotime($key['date'])) }}</p>
                        <p>{{$key['title']}}</p>
                        <a href="/eventos/{{$key['id']}}" class="btn btn-primary">Saiba Mais</a>
                    </div>
                </div>
            </div>
            @endforeach

            @if(count($events) == 0 && $search)
                <p class="fs-5 text-secondary mt-3">Não foram encontrados resultados para a busca: {{$search}}. <a href="/">Voltar para Dashboard</a></p>
            @elseif(count($events) == 0)
                <p class="fs-5 text-secondary mt-3">Não há eventos disponíveis.</p>
            @endif

        </div>

    </div>
</section>

@endsection("content")