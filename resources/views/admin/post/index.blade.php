@extends('admin.layouts.base')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <a href="{{route('admin.posts.create')}}" class="mt-3 mb-3 btn btn-primary">Crea un post</a>

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Contenuto</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Azioni</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{substr($post->content, 0, 30)}}</td>
                            <td>{{$post->slug}}</td>
                            {{-- risolto problema se utente non seleziona nessuna categoria --}}
                            <td>{{isset($post->category)?$post->category->name: 'N.D.')}}</td>
                            <td class="d-flex justify-content-between">
                                <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-primary">Vedi</a>
                                <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-secondary">Modifica</a>
                               
                                <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">
                                
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>

@endsection