@extends('admin.layouts.app')

@section('content')

<div class="container mb-5">
    <div class="row">
        <div class="col-12 col-md-11 col-lg-7 col-xl-6 mx-auto">
            <div class="app-branding text-center mb-5">
  
            </div><!--//app-branding-->  
            
            <div class="app-card p-5 text-center shadow-sm">
                <h1 class="page-title mb-4"><br><span class="font-weight-light">Escolha uma Campanha!</span></h1>
                <form action="{{ route('atendimentos.atenderLoteForm')}}" method="GET">
                    <div class="mb-4">
                        <center>
                        
                            <select class="form-select w-auto" name="campanha_id" required >
                                <option selected value=" ">--CAMPANHA--</option>
                                @foreach ($campanhas as $camp)
                                    <option value="{{ $camp->id }}">{{ $camp->titulo }}</option>
                                @endforeach
                            </select>
                        
                        </center>
                    </div>
                    <button class="btn app-btn-primary" type="submit" > Listar Pacientes </button>
                </form>
            </div>
        </div><!--//col-->
    </div><!--//row-->
</div><!--//container-->
    
@endsection