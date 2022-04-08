@extends('admin.layouts.base')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h1>Crea un nuovo post</h1>

            <form method="POST" action="{{route('admin.posts.store')}}">
                @csrf

                <div class="form-group">
                    <label for="category_id">Categoria</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="">Nessuna categoria</option>
                        @foreach ($categories as $category)
                            <option {{old('category_id') == $category->id ? 'selected': ''}} value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                  <label for="title">Titolo</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                </div>
                
                <div class="form-group">
                    <label for="content">Contenuto post</label>
                    <textarea name="content" class="form-control" id="content" name="content" value="{{old('content')}}"></textarea>
                </div>
                
                @foreach ($tags as $tag)
                <div class="custom-control custom-checkbox mt-3 mb-3">
                    <input name="tags[]" type="checkbox" class="custom-control-input" id="tag_{{$tag->id}}" value="{{$tag->id}}" {{in_array($tag->id, old('tags', []))?'checked': ''}}>
                    <label class="custom-control-label" for="tag_{{$tag->id}}">{{$tag->name}}</label>
                </div>
                @endforeach
                
                <button type="submit" class="btn btn-primary">Salva</button>
              </form>

        </div>
    </div>
</div>

@endsection