@extends("layouts.main")

@section("title", "Painel de Controle")

@section("content")
<section id="section-eventsOwner">
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Título</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $key)
                <tr>
                    <th scope="row">{{$loop->index + 1}}</th>
                    <td>{{$key['title']}}</td>
                    <td>n</td>
                    <td>
                        <a href="/eventos/editar/{{$key['id']}}" class="btn btn-warning">Editar</a>
                        <form method="POST" action="/eventos/{{$key['id']}}" class="d-inline">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger" onclick="this.form.submit()">Deletar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection