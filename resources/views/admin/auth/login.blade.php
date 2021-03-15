@extends('admin.layouts.login')
@section('content')
<div class="app-auth-body mx-auto">	
    <div class="app-auth-branding mb-4"><a class="app-logo" href="#"><img class="logo-icon mr-2"  src="{{ asset('portal/assets/images/favico.png') }}" alt="logo"></a></div>
    <h2 class="auth-heading text-center mb-5">M-SAUDE, Seja bem-vindo(a),</h2>
    <div class="auth-form-container text-left">

        <form class="auth-form login-form" action="{{ route('admin.auth') }}"  method="POST" > 
            @csrf        
            <div class="mb-3">
                <label class="sr-only @error('email') is-invalid @enderror" for="email">Email</label>
                <input id="email" name="email" type="email" class="form-control " placeholder="Email" required>
                <div class="invalid-feedback">@error('email') {{ $message }} @enderror</div>
            </div><!--//form-group-->


            <div class="mb-3">
                <label class="sr-only @error('password') is-invalid @enderror" for="password">Senha</label>
                <input id="password" name="password" type="password" class="form-control " placeholder="Senha" required>
                <div class="invalid-feedback">@error('password') {{ $message }} @enderror</div>
            </div><!--//form-group-->

            <div class="text-center">
                <button type="submit" class="btn app-btn-primary btn-block theme-btn mx-auto">Entrar</button>
            </div>
        </form>
        
        <div class="auth-option text-center pt-5">Ainda não tem cadastro? Clique <a class="text-link" href="#" >Aqui</a>.</div>
    </div><!--//auth-form-container-->	

</div><!--//auth-body-->  
@endsection