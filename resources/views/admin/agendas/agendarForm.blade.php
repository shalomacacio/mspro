@extends('admin.layouts.app')

@section('content')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            {{-- alerts --}}
            @include('admin.layouts.alerts.session')
            <h1 class="app-page-title">Agendar</h1>
            <div class="row gy-4">
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                        <div class="app-card-header p-3 border-bottom-0">
                            <div class="row align-items-center gx-3">
                                <div class="col-auto">
                                    <div class="app-icon-holder">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                        </svg>
                                    </div><!--//icon-holder-->
                                    
                                </div><!--//col-->
                                <div class="col-auto">
                                    <h4 class="app-card-title">Paciente</h4>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <form class="settings-form px-4 w-100"  action="{{ route('agendas.store') }}" method="POST">
                            <div class="app-card-body px-4 w-100">
                                @csrf
                                <div class="mb-10">
                                    <label for="nome" class="form-label @error('nome') is-invalid @enderror">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" 
                                    @isset($paciente->nome)
                                      value="{{$paciente->nome }}"
                                    @endisset>
                                    <div class="invalid-feedback">@error('nome') {{ $message }} @enderror</div>
                                </div>

                                <div class="mb-3">
                                    <label for="campanha_id" class="form-label @error('campanha_id') is-invalid @enderror">Campanha</label>
                                        <select class="form-control" id="campanha_id" name="campanha_id" required>
                                            <option value=" ">--Selecione--</option>
                                            @foreach ($campanhas as $camp)
                                                <option value="{{ $camp->id }}">{{ $camp->titulo }}</option>
                                            @endforeach  
                                        </select>
                                    <div class="invalid-feedback">@error('campanha_id') {{ $message }} @enderror</div>
                                </div>

                                <div class="col-auto">
                                    <label for="dh_agendamento" class="form-label @error('dh_agendamento') is-invalid @enderror">Data</label>
                                    <input type="date" name="dh_agendamento" class="form-control search-orders" required>
                                    <div class="invalid-feedback">@error('dh_agendamento') {{ $message }} @enderror</div>
                                </div>
                            </div><!--//app-card-body-->
                            <input type="hidden" name="paciente_id"  value="{{ $paciente->id }}" />
                            <input type="hidden" name="user_id"  value="{{ Auth::user()->id }}" />
                            <div class="app-card-footer p-4 mt-auto">
                                <button class="btn app-btn-secondary" type="submit" >Agendar</button>
                                <a href="{{ route('atendimentos.create', $paciente->id) }}" class="btn app-btn-secondary"> Atender </a>

                            </div><!--//app-card-footer-->

                        </form>
                       
                    </div><!--//app-card-->
                </div><!--//col-->
            </div><!--//row-->
            
        </div><!--//container-fluid-->
    </div><!--//app-content-->
    
</div><!--//app-wrapper-->    

@endsection