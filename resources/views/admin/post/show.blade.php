@extends('admin.layouts.base')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Visualiazza post</h1>
            <div><strong>Titolo: </strong>{{$post->title}}</div>
            <div><strong>Contenuto: </strong>{!! $post->content !!}</div>
            <div><strong>Slug: </strong>{{$post->slug}}</div>
            <div><strong>Categoria: </strong> {{$post->category->name}}</div>

            <a href="{{route('admin.posts.index')}}" class="btn btn-primary mt-3">Torna alla lista</a>
        </div>
    </div>
</div>

@endsection