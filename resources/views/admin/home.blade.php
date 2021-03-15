@extends('admin.layouts.app')

@section('content')

    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <h1 class="app-page-title">Vacinação COVID-19 </h1>

                <div class="row g-4">
                    <div class="col-12 col-md-6">
                        <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                            <div class="app-card-header p-3 border-bottom-0">
                                <div class="row align-items-center gx-3">
                                    <div class="col-auto">
                                        <div class="app-icon-holder icon-holder-mono">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-life-preserver"
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M14.43 10.772l-2.788-1.115a4.015 4.015 0 0 1-1.985 1.985l1.115 2.788a7.025 7.025 0 0 0 3.658-3.658zM5.228 14.43l1.115-2.788a4.015 4.015 0 0 1-1.985-1.985L1.57 10.772a7.025 7.025 0 0 0 3.658 3.658zm9.202-9.202a7.025 7.025 0 0 0-3.658-3.658L9.657 4.358a4.015 4.015 0 0 1 1.985 1.985l2.788-1.115zm-8.087-.87L5.228 1.57A7.025 7.025 0 0 0 1.57 5.228l2.788 1.115a4.015 4.015 0 0 1 1.985-1.985zM8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm0-5a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                            </svg>
                                        </div>
                                        <!--//icon-holder-->

                                    </div>
                                    <!--//col-->
                                    <div class="col-auto">
                                        <h4 class="app-card-title">O que é Doses de Esperança?</h4>
                                    </div>
                                    <!--//col-->
                                </div>
                                <!--//row-->
                            </div>
                            <!--//app-card-header-->
                            <div class="app-card-body px-4">

                                <div class="intro mb-3">Maranguape foi umas das primeiras cidades do Ceará a iniciar a vacinação contra a COVID-19. A Prefeitura montou uma força-tarefa para levar adiante o Plano de imunização Municipal, e segue empenhada em dar continuidade ao cronograma das vacinações.</div>
                                <ul class="list-unstyled">
                                    <li>
                                        @include('admin.layouts.svg.check')  Se precisar sair, use a máscara facial.
                                    </li>
                                    <li>
                                       @include('admin.layouts.svg.check') Lave as mãos com água e sabão ou use álcool gel 70%.
                                    </li>
                                    <li>
                                        @include('admin.layouts.svg.check') Mantenha 2 metros de distância de qualquer pessoa.
                                    </li>

                                </ul>
                            </div>
                            <!--//app-card-body-->
                            <div class="app-card-footer p-4 mt-auto">
                                <a class="btn app-btn-primary" href="#">Ir pra Home</a>
                            </div>
                            <!--//app-card-footer-->
                        </div>
                        <!--//app-card-->
                    </div>
                    <!--//col-->
                </div>
                <!--//row-->

            </div>
            <!--//container-fluid-->
        </div>
        <!--//app-content-->


    </div>

@endsection



