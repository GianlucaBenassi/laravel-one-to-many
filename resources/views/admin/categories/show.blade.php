@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- title --}}
        <h1 class="text-center">Posts list for category {{$category->name}}</h1>

        @if ($category->posts->isEmpty())
            <h2>No posts with this category</h2>
        @else

            {{-- posts row --}}
            <div class="row row-cols-2">
                
                @foreach ($category->posts as $post)
                    <div class="col my-3">
                        <div class="card h-100">
                            
                            <div class="card-body">
                                
                                <h3 class="card-title">{{$post->title}}</h3>
                                @if ($post->published == 0)
                                <span class="badge badge-secondary">Draft</span>
                                @else
                                <span class="badge badge-success">Published</span>
                                @endif
                                <span class="d-block">Created: {{$post->created_at}}</span>
                                
                            </div>
                            
                            <div class="card-footer d-flex">
                                <a href="{{route('posts.show', $post->id)}}"><button type="button" class="btn btn-info">Info</button></a> 
                            </div>
                            
                        </div>  
                    </div>
                @endforeach

            </div>

        @endif

        {{-- return button --}}
        <a href="{{route('categories.index')}}" class="d-block mt-3"><button type="button" class="btn btn-dark">Categories list</button></a>

    </div>
@endsection