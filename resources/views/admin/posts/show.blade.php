@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- title --}}
        <h2 class="text-center mb-5">{{$post->title}}</h2>
        {{-- content --}}
        <p>{{$post->content}}</p>
        {{-- Id --}}
        <span class="d-block"><strong>Id:</strong> {{$post->id}}</span>
        {{-- Slug --}}
        <span class="d-block"><strong>Slug:</strong> {{$post->slug}}</span>
        {{-- Published --}}
        @if ($post->published == 0)
            <span class="badge badge-secondary">Draft</span>
        @else
            <span class="badge badge-success">Published</span>
        @endif
        {{-- Category --}}
        @if ($post->category)
            <span class="d-block"><strong>Category:</strong> {{$post->category->name}}</span>
        @else
            <span class="d-block"><strong>Category:</strong> Null</span>
        @endif
        {{-- Creation date --}}
        <span class="d-block mb-5"><strong>Created:</strong> {{$post->created_at}}</span>

        <a href="{{route('posts.index')}}"><button type="button" class="btn btn-dark">Posts list</button></a>
        <a href="{{route('posts.edit', $post->id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
        {{-- modal delete button --}}
        <button type="button" class="btn btn-danger ml-auto" data-toggle="modal" data-target="#deleteModal">Delete</button>

        {{-- modal --}}
        <div class="modal fade" id="deleteModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Are you sure to delete <strong>{{$post->title}}</strong>?</h5>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {{-- delete form --}}
                        <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection