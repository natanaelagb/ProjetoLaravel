@extends("layouts.main")

@section("title", "Painel de Controle")

@section("content")
<section id="dashboard" class="container">
    <div class="row">
        <div class="col-sm-3 mt-3">
            <div id="target"class="card">
                <div class="card-body p-0">
                    <div class="border-bottom">
                        <a class="div-link p-2 link-active" target="card-owner">
                            <i class="bi bi-gear"></i>
                            Meus Eventos
                        </a>
                    </div>
                    <div class="border-bottom">
                        <a class="div-link p-2" target="card-participant">Eventos que participo</a>
                    </div>

                </div>
            </div>
        </div>
        <!--Col3-->

        <div class="col-sm-9">
            <div id="card-owner" class="card mt-3">
                <div class="card-head bg-secondary text-white ">
                    <h2 class="display-6 fs-4 ps-3 py-1">Meus eventos: </h2>
                </div>
                <div class="card-body overflow">
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
                                <td>{{ count($key->users)}}</td>
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
            </div>

            <div id="card-participant" class="card mt-4">
                <div class="card-head bg-secondary text-white ">
                    <h2 class="display-6 fs-4 ps-3 py-1">Eventos que participo: </h2>
                </div>
                <div class="card-body overflow">
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
                            @foreach($user->eventsAsParticipant as $key)
                            <tr>
                                <th scope="row">{{$loop->index + 1}}</th>
                                <td>{{$key['title']}}</td>
                                <td>{{ count($key->users)}}</td>
                                <td>
                                    <form method="POST" action="/eventos/sair/{{$key['id']}}" class="d-inline">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger" onclick="this.form.submit()">Cancelar
                                            Inscrição</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--Col9-->
    </div>
    <!--Row-->


</section>

@endsection