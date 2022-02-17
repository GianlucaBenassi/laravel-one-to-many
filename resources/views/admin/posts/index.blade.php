@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center mt-3">Posts list</h1>
        <a href="{{route('posts.create')}}"><button type="button" class="btn btn-success">Add post</button></a>

        @foreach ($posts as $post)
            
            <div class="card my-5">

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
                    <a href="{{route('posts.edit', $post->id)}}" class=ml-2><button type="button" class="btn btn-primary">Edit</button></a>
                    {{-- modal delete button --}}
                    <button type="button" class="btn btn-danger ml-auto" data-toggle="modal" data-target="#deleteModal-{{$post->id}}">Delete</button>

                    {{-- modal --}}
                    <div class="modal fade" id="deleteModal-{{$post->id}}" tabindex="-1">
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

            </div>

        @endforeach

    </div>
@endsection