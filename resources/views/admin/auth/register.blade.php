@extends('admin.layouts.login')

@section('content')
    
<div class="app-auth-body mx-auto">	
  <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon mr-2" src="{{ asset('portal/assets/images/favico.png') }}"  alt="logo"></a></div>
<h2 class="auth-heading text-center mb-4">Cadastre-se </h2>					

<div class="auth-form-container text-left mx-auto">
  <form class="auth-form auth-signup-form"  method="POST" >  
    @csrf

    <div class="mb-3">
      <label class="sr-only @error('nome') is-invalid @enderror" for="cpf">NOME</label>
      <input id="nome" name="nome" type="text" class="form-control signup-name" placeholder="Nome Completo" required >
      <div class="invalid-feedback">@error('nome') {{ $message }} @enderror</div>
    </div>

    <div class="mb-3">
      <label class="sr-only @error('cpf') is-invalid @enderror" for="cpf">CPF</label>
      <input id="cpf" name="cpf" type="text" class="form-control " placeholder="CPF" required>
      <div class="invalid-feedback">@error('cpf') {{ $message }} @enderror</div>
    </div><!--//form-group-->

    <div class="mb-3">
        <label class="sr-only @error('celular') is-invalid @enderror" for="celular">Celular</label>
        <input id="celular" name="celular" type="text" class="form-control " placeholder="DDD + Nº Celular" required>
        <div class="invalid-feedback">@error('celular') {{ $message }} @enderror</div>
    </div><!--//form-group-->


    <div class="extra mb-3">
    </div><!--//extra-->
    
    <div class="text-center">
      <button type="submit" class="btn app-btn-primary btn-block theme-btn mx-auto">Cadastrar</button>
    </div>
  </form><!--//auth-form-->
  
  <div class="auth-option text-center pt-5">Já possui cadastro? <a class="text-link" href="#" >Faça o login</a></div>
</div><!--//auth-form-container-->	


  
</div><!--//auth-body-->
@endsection