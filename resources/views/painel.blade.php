@extends('layouts.main')

@section('title', 'Painel de Controle')

@section('content')
<!-- Painel de Controle -->

<section id="section-nav" class="bg-grey-light text-white">
    <div class="container">
        <div id="div-painel" class="d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <i class="bi-gear-fill fs-4 me-3"></i><span class="fs-5">Painel de Controle</span>
            </div>
            <div class="d-flex align-items-center">
                <i class="bi-calendar-check fs-5 me-2"></i>
                <p class="m-0"></p>
            </div>
        </div>
    </div>
</section>

<!-- Painel -->
<section id="section-painel" class="bg-light pt-4">
    <div class="container">

        <div class="row">

            <!-- Localização no site -->

            <div id="card-info" class="col-lg-3 mb-3">
                <div class="card">

                    <div class="card-body p-0">
                        <div class="border-bottom">
                            <a class="div-link p-2 div-active" target="#card-sobre"><i id="active-gear"
                                    class="bi bi-gear-fill me-2"></i>Sobre</a>
                        </div>
                        <div class="border-bottom">
                            <a class="div-link text-secondary p-2" target="#card-cadastro">Cadastrar Equipe</a>
                        </div>
                        <div class="border-bottom">
                            <a class="div-link text-secondary p-2" target="#card-lista">Listar Equipe</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cards -->

            <div class="col-lg-9">

                <div id="card-lista" class="card mb-4">
                    <div class="card-header bg-secondary text-light fs-6">Listar Equipe</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-sm align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    <tr>
                                        <th scope="row"></th>
                                        <td></td>
                                        <td class="d-flex justify-content-center align-items-center">
                                            <form method="post" class="m-0">
                                                <input type="Submit" class="btn btn-danger" name="delete"
                                                    value="Delete">
                                                <input type="hidden" name="id" value="">
                                            </form>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</section>

@endsection