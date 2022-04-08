@extends ("admin.layouts.base")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Dettagli categoria</h1>
                <div><strong>Name: </strong>{{$category->name}}</div>
                <div><strong>Slug: </strong> {{$category->slug}}</div>

                <a href="{{route('admin.categories.index')}}" class="btn btn-primary">Torna alla lista</a>
            </div>
        </div>
    </div>
@endsection
