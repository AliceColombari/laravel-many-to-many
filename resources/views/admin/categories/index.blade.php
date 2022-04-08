@extends ("admin.layouts.base")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <a href="{{route('admin.categories.create')}}" class="btn btn-primary my-3">Crea una categoria</a>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                              
                                <td class="d-flex">
                                    <a href="{{route('admin.categories.show', $category->id)}}" class="btn btn-primary">Vedi</a>

                                    @if ($category->id > 1)
                                        <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-secondary mx-2">Modifica</a>

                                        <form method="POST" action="{{route('admin.categories.destroy', $category->id)}}">

                                            @csrf
                                            @method("DELETE")

                                            <button class="btn btn-danger">Elimina</button>
                                        </form>
                                    @endif
                                    
                                </td>
                            </tr>                            
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection