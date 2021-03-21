<div class="mb-10">
    <label for="paciente_id" class="form-label @error('paciente_id') is-invalid @enderror">Paciente</label>
    <input type="text" class="form-control" id="paciente_id" name="paciente_id" value="{{ $paciente->nome }}" disabled >
    <div class="invalid-feedback">@error('titulo') {{ $message }} @enderror</div>
</div>

<div class="mb-10">
    <label for="cpf" class="form-label @error('cpf') is-invalid @enderror">CPF</label>
    <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $paciente->cpf }}" disabled >
    <div class="invalid-feedback">@error('cpf') {{ $message }} @enderror</div>
</div>

<div class="mb-10">
    <label for="cns" class="form-label @error('cns') is-invalid @enderror">CNS</label>
    <input type="text" class="form-control" id="cns" name="cns" value="{{ $paciente->cns }}" disabled >
    <div class="invalid-feedback">@error('cns') {{ $message }} @enderror</div>
</div>

<div class="mb-10">
    <label for="celular" class="form-label @error('celular') is-invalid @enderror">Celular</label>
    <input type="text" class="form-control" id="celular" name="celular" value="{{ $paciente->celular }}" disabled >
    <div class="invalid-feedback">@error('celular') {{ $message }} @enderror</div>
</div>



<input type="hidden" name="paciente_id" value="{{ $paciente->id }}" />