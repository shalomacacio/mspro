@if($errors->any())
  <div class="invalid-feedback">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
  </div>
@endif