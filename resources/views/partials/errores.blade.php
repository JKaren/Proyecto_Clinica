@if(!$errors->isEmpty())
  <div class="alert alert-warning">
    <p>Oops! Por favor corrige los siguientes errores:</p>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
@endif
