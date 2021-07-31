@extends("layouts.main")

@section("title", "Editando: ". $event['title'])

@section("content")
<section id="section-create">
    <div id="form-container">
        <h2 class="mb-3 display-6"> Editando: {{$event['title']}}</h2>
        <form method="POST" action="/eventos/{{$event['id']}}" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="mb-3">
                <label for="title" class="form-label">Titulo</label>
                <input type="text" id="title" class="form-control" name="title" value="{{$event['title']}}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea id="description" class="form-control" name="description" rows="4" >
                    {{$event['description']}}
                </textarea>
            </div>

            <div class="mb-3">
                <label for="city" class="form-label">Cidade</label>
                <input type="text" id="city" class="form-control" name="city" value="{{$event['city']}}">
            </div>

            <div class="mb-3">
                <label for="private" class="form-label">Privado:</label>
                <select class="form-select" name="private">
                    <option value="0">Não</option>
                    <option value="1" {{ $event['private'] == 1 ? 'selected' : '' }}>Sim</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Imagem:</label>
                <div>
                    <input type="file" id="image" class="form-control w-50 d-inline" name="image">
                    <img src="/img/events/{{$event['image']}}" width="48%">
                </div>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Data:</label>
                <input type="datetime-local" id="date" class="form-control" name="date" value="{{ strftime('%Y-%m-%dT%H:%M:%S', strtotime($event['date'])) }}">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="items[]" value="Cadeiras">
                Cadeiras
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="items[]" value="Palco">
                Palco
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="items[]" value="Open Food">
                Open Food
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="items[]" value="Brindes">
                Brindes
            </div>

            <button type="submit" class="btn btn-primary px-5 my-3">Enviar</button>

        </form>
    </div>
</section>

@endsection("content")