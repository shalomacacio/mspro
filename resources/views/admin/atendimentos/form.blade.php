<div class="mb-3">
    <label for="agenda_id" class="form-label @error('agenda_id') is-invalid @enderror">Campanha</label>
        <select class="form-control" id="agenda_id" name="agenda_id" required>
            @foreach ($agendas as $agenda)
                <option value="{{ $agenda->id }}">{{ $agenda->campanha->titulo }}</option>
            @endforeach  
        </select>
    <div class="invalid-feedback">@error('agenda_id') {{ $message }} @enderror</div>
</div>

<div class="mb-3">
    <label for="vacina_id" class="form-label @error('vacina_id') is-invalid @enderror">Tipo de Vacina</label>
        <select class="form-control" id="vacina_id" name="vacina_id" required>
            <option value=" ">--Selecione--</option>
            @foreach ($vacinas as $vacina)
                <option value="{{ $vacina->id }}">{{ $vacina->nome }}</option>
            @endforeach  
        </select>
    <div class="invalid-feedback">@error('vacina_id') {{ $message }} @enderror</div>
</div>

<div class="mb-3">
    <label for="campanha_id" class="form-label @error('campanha_id') is-invalid @enderror">Observação</label>
    <textarea class=" form-control" id="obs" name="obs"  rows="10"> </textarea>
    <div class="invalid-feedback">@error('obs') {{ $message }} @enderror</div>
</div>




<input type="hidden" name="paciente_id" value="{{ $paciente->id }}" />
<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />