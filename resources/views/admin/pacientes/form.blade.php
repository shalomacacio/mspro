<div class="mb-10">
    <label for="nome" class="form-label @error('nome') is-invalid @enderror">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" 
    @isset($paciente->nome)
      value="{{$paciente->nome }}"
    @endisset>
    <div class="invalid-feedback">@error('nome') {{ $message }} @enderror</div>
</div>

<div class="mb-10">
    <label for="cpf" class="form-label @error('cpf') is-invalid @enderror">CPF</label>
    <input type="text" class="form-control" id="cpf" name="cpf"
    @isset($paciente->cpf)
        value="{{$paciente->cpf }}"
    @endisset>
    <div class="invalid-feedback">@error('cpf') {{ $message }} @enderror</div>
</div>

<div class="mb-10">
    <label for="celular" class="form-label @error('celular') is-invalid @enderror">Celular</label>
    <input type="text" class="form-control" id="celular" name="celular"
    @isset($paciente->celular)
        value="{{$paciente->celular }}"
    @endisset>
    <div class="invalid-feedback">@error('celular') {{ $message }} @enderror</div>
</div>

<div class="mb-3">
    <label for="dt_nascimento" class="form-label @error('dt_nascimento') is-invalid @enderror">Data de
        Nascimento</label>
    <input type="date" class="form-control" id="dt_nascimento" name="dt_nascimento">
    <div class="invalid-feedback">@error('dt_nascimento') {{ $message }} @enderror</div>
</div>

<div class="mb-3">
    <label for="sexo" class="form-label @error('sexo') is-invalid @enderror">Sexo</label>
    <select class="form-control" id="sexo" name="sexo">
        <option value=" ">--SELECIONE--</option>
        <option @if($paciente->sexo === "M") selected  @endif value="M">MASCULINO</option>
        <option @if($paciente->sexo === "F") selected  @endif value="F">FEMININO</option>
    </select>
    <div class="invalid-feedback">@error('sexo') {{ $message }} @enderror</div>
</div>

<div class="mb-10">
    <label for="rua" class="form-label @error('rua') is-invalid @enderror">Endereço</label>
    <input type="text" class="form-control" id="rua" name="rua"
    @isset($paciente->rua)
        value="{{$paciente->rua }}"
    @endisset>
    <div class="invalid-feedback">@error('rua') {{ $message }} @enderror</div>
</div>

<div class="mb-2">
    <label for="num" class="form-label @error('num') is-invalid @enderror">Nº</label>
    <input type="text" class="form-control" id="num" name="num"
        @isset($paciente->num)
            value="{{$paciente->num }}"
        @endisset>
    <div class="invalid-feedback">@error('num') {{ $message }} @enderror</div>
</div>

<div class="mb-3">
    <label for="bairro" class="form-label @error('bairro') is-invalid @enderror">Bairro</label>
    <select class="form-control" name="bairro">
        <option selected="" value=" ">--SELECIONE--</option>
        @foreach ($bairros as $bairro)
            <option value="{{ $bairro->id }}">{{ $bairro->nome }}</option>
        @endforeach
    </select>
    <div class="invalid-feedback">@error('bairro') {{ $message }} @enderror</div>
</div>

<div class="mb-3">
    <label for="cns" class="form-label @error('cns') is-invalid @enderror">CNS - CARTÃO NACIONAL DE SAÚDE
        <span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top"
            data-content="Número da Carteira do SUS com 15 dígitos"> @include('admin.layouts.svg.bi-info-circle')
        </span>
    </label>
    <input type="text" class="form-control" id="cns" name="cns"
        @isset($paciente->cns)
            value="{{$paciente->cns }}"
        @endisset>
    <div class="invalid-feedback">@error('cns') {{ $message }} @enderror</div>
</div>

<div class="mb-3">
    <label for="ubs" class="form-label @error('ubs_id') is-invalid @enderror">UBS - Unidade Básica de Sáúde
        <span class="ml-2" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top"
            data-content="POSTO DE SAÚDE"> @include('admin.layouts.svg.bi-info-circle')
        </span>
    </label>
    <select class="form-control" id="ubs_id" name="ubs_id" required>
        <option  value=" ">--SELECIONE--</option>
        @foreach ($ubs as $u)
            <option value="{{ $u->id }}">{{ $u->nome }}</option>
        @endforeach
    </select>
    <div class="invalid-feedback">@error('ubs_id') {{ $message }} @enderror</div>
</div>

<div class="mb-3">
    <label for="agente_saude" class="form-label @error('agente_saude') is-invalid @enderror">Agente de Saúde</label>
    <input type="text" class="form-control" id="agente_saude" name="agente_saude"
        @isset($paciente->agente_saude)
            value="{{$paciente->agente_saude }}"
        @endisset>
    <div class="invalid-feedback">@error('agente_saude') {{ $message }} @enderror</div>
</div>
