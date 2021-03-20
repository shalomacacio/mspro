<div class="mb-10">
    <label for="paciente_id" class="form-label @error('paciente_id') is-invalid @enderror">Paciente</label>
    <input type="text" class="form-control" id="paciente_id" name="paciente_id" value="{{ $paciente->nome }}" disabled >
    <div class="invalid-feedback">@error('titulo') {{ $message }} @enderror</div>
</div>




<input type="hidden" name="paciente_id" value="{{ $paciente->id }}" />