@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center mt-3">Categories list</h1>
        <a href="{{route('categories.create')}}"><button type="button" class="btn btn-success">Add category</button></a>

        <table class="table mt-3">

            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td>
                            <a href="{{route('categories.show', $category->id)}}"><button type="button" class="btn btn-info">Posts</button></a>
                            <a href="{{route('categories.edit', $category->id)}}" class=ml-2><button type="button" class="btn btn-primary">Edit</button></a>
                            {{-- modal button --}}
                            <button type="button" class="btn btn-danger ml-auto" data-toggle="modal" data-target="#deleteModal-{{$category->id}}">Delete</button>

                            {{-- delete modal --}}
                            <div class="modal fade" id="deleteModal-{{$category->id}}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Are you sure to delete <strong>{{$category->name}}</strong>?</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            {{-- delete form --}}
                                            <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
@endsection