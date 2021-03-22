<div class="mb-10">
    <label for="titulo" class="form-label @error('titulo') is-invalid @enderror">Titulo</label>
    <input type="text" class="form-control" id="titulo" name="titulo" 
    @isset($campanha->titulo)
      value="{{ $campanha->titulo }}"
    @endisset>
    <div class="invalid-feedback">@error('titulo') {{ $message }} @enderror</div>
</div>

<div class="mb-10">
  <label for="descricao" class="form-label @error('descricao') is-invalid @enderror">Descricao</label>
  <textarea class=" form-control" id="descricao" name="descricao"  rows="10">
    @isset($campanha->descricao)
      {{ $campanha->descricao }}
    @endisset
  </textarea>
  <div class="invalid-feedback">@error('titulo') {{ $message }} @enderror</div>
</div>

<div class="mb-3">
  <label for="dt_inicio" class="form-label @error('dt_inicio') is-invalid @enderror">Data Início</label>
  <input type="date" class="form-control" id="dt_inicio" name="dt_inicio">
  <div class="invalid-feedback">@error('dt_inicio') {{ $message }} @enderror</div>
</div>

<div class="mb-3">
  <label for="dt_fim" class="form-label @error('dt_fim') is-invalid @enderror">Data Fim</label>
  <input type="date" class="form-control" id="dt_fim" name="dt_fim">
  <div class="invalid-feedback">@error('dt_fim') {{ $message }} @enderror</div>
</div>

<div class="mb-3">
  <label for="ativa" class="form-label @error('ativa') is-invalid @enderror">Ativa</label>
  <input type="checkbox" name="ativa"  value="1"  />
  <div class="invalid-feedback">@error('ativa') {{ $message }} @enderror</div>
</div>