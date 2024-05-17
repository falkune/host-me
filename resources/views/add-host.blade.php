@extends('layouts.app')

@section('content')

<div class="m-auto">
    <form method="post" action="/add-host" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Titre</label>
        <input type="text" name="titre" class="form-control" id="exampleInputEmail1">
      </div>

      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Localisation</label>
        <input type="text" name="localisation" class="form-control" id="exampleInputPassword1">
      </div>
      
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Image</label>
        <input type="file" name="image" class="form-control" id="exampleInputPassword1">
      </div>
      
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


@endsection
