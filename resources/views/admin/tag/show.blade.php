@extends('admin.layouts.base')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Visualiazza tag</h1>
            <div><strong>Nome: </strong>{{$tag->name}}</div>
            <div><strong>Slug: </strong>{{$tag->slug}}</div>

            <div>
                <ul>
                    @foreach ($tag->posts as $post)
                        <li>
                            <a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <a href="{{route('admin.tags.index')}}" class="btn btn-primary mb-3">Torna alla lista</a>
        </div>
    </div>
</div>

@endsection