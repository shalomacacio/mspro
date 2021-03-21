@extends('admin.layouts.app')

@section('content')

<div class="app-wrapper">
	    
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            {{-- alerts --}}
            @include('admin.layouts.alerts.session')
            <h1 class="app-page-title">Paciente</h1>
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
                                    <h4 class="app-card-title">Dados Pessoais</h4>
                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body px-4 w-100">
                            <form class="settings-form"  action="{{ route('pacientes.store') }}" method="POST">
                                @csrf
                                @include('admin.pacientes.form')

                                @foreach ($comorbidades as $comorbidade)
                                <div class="form-check form-switch">
                                  <input class="form-check-input" type="checkbox"  name="comorbidades[]" value="{{ $comorbidade->id }}">
                                  <label class="form-check-label" > {{ $comorbidade->descricao }} </label>
                                </div> 
                                @endforeach

                                <div class="app-card-footer p-4 mt-auto">
                                    <button class="btn app-btn-secondary" type="submit" >Salvar</button>
                                </div><!--//app-card-footer-->
                            </form>
                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                </div><!--//col-->
            </div><!--//row-->
            
        </div><!--//container-fluid-->
    </div><!--//app-content-->
    
</div><!--//app-wrapper-->    

@endsection