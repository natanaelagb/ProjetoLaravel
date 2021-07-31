@extends("layouts.main")

@section("title", "Create")

@section("content")
<section id="section-create">
    <div id="form-container">
        <h2 class="mb-3 display-6">Crie o seu evento:</h2>
        <form method="POST" action="/eventos" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titulo</label>
                <input type="text" id="title" class="form-control" name="title">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea id="description" class="form-control" name="description" rows="4">
                </textarea>
            </div>

            <div class="mb-3">
                <label for="city" class="form-label">Cidade</label>
                <input type="text" id="city" class="form-control" name="city">
            </div>

            <div class="mb-3">
                <label for="private" class="form-label">Privado:</label>
                <select class="form-select" name="private">
                    <option value="1">Sim</option>
                    <option value="0" selected>Não</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Imagem:</label>
                <input type="file" id="image" class="form-control" name="image">
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Data:</label>
                <input type="datetime-local" id="date" class="form-control" name="date">
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