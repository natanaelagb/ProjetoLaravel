@extends("layouts.main")

@section("title", "Events")

@section("content")

<section id="search-container">
    <div class="overlay"></div>
    <div class="w-50">
        <h2 class="display-6">Busque um evento</h2>
        <form action="/" class="d-flex" method="GET">
            <input type="text" id="search" name="search" placeholder="Pesquisar...">
            <button type="submit" class="bg-primary" id="button-search"><i class="bi bi-search"></i></button>
        </form>
    </div>
</section>

<section id="events-container" class="pt-4">
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
                        <img src="/img/events/{{$key['image']}}">
                    </div>

                    <div class="card-body">
                        <div class="d-flex">
                            <i class="bi bi-calendar-check me-2"></i>
                            <p>{{ date("l, d/m/Y H:i", strtotime($key['date'])) }}</p>
                        </div>
                        <div class="d-flex">
                            <i class="bi bi-people me-2"></i>
                            <p> 
                            @if(count($key->users) == 1)
                                1 Participante
                            @else
                                {{count($key->users)}} Participantes
                            @endif
                            </p>
                        </div>
                        <div class="d-flex">
                            <i class="bi bi-bookmarks me-2"></i>
                            <p> {{$key['title']}}</p>
                        </div>

                        <a href="/eventos/{{$key['id']}}" class="btn btn-primary">Saiba Mais</a>
                    </div>
                </div>
            </div>
            @endforeach

            @if(count($events) == 0 && $search)
            <p class="fs-5 text-secondary mt-3">Não foram encontrados resultados para a busca: {{$search}}. <a href="/">Voltar para Pagina Inicial</a></p>
            @elseif(count($events) == 0)
            <p class="fs-5 text-secondary mt-3">Não há eventos disponíveis.</p>
            @endif

        </div>

    </div>
</section>
@endsection("content")

@section("scripts")
<script src="/js/home.js"></script>
@endsection