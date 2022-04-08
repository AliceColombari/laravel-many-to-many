@extends ("admin.layouts.base")

@section("content")
    <div class="container">

      <h1>Modifica categoria</h1>

      <form method="POST" action="{{route('admin.categories.update', $category->id)}}">

          @csrf
          @method("PUT")
          
          <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old("name", $category->name)}}" required>
          </div>                
          
          <button type="submit" class="btn btn-primary">Salva</button>

      </form>

        
        
    </div>
@endsection