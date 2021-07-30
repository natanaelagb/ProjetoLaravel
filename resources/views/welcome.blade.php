@extends("layouts.main")

@section("title", "HDC Events")

@section("content")

<section id="search-container">
    <div class="overlay"></div>
    <div class="w-50">
        <h2 class="display-6">Busque um evento</h2>
        <form action="">
            <input type="text" class="form-control" id="search" name="search" placeholder="Pesquisar...">
        </form>
    </div>
</section>

<section id="events-container" class="my-4">
    <div class="container">
        <h2 class="display-6">Proximos Eventos</h2>
        <p>Veja os eventos nos próximos dias</p>
        <div class="row">
            @foreach($events as $key)
            <div class="col-md-4 p-2">
                <div class="card">
                    <img src="img/event_placeholder.jpg">
                    <div class="card-body">
                        <p>29/07/2021</p>
                        <p>{{$key['title']}}</p>
                        <a href="#" class="btn btn-primary">Saiba Mais</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>

@endsection("content")