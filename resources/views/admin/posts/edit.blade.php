@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center mb-3">Modify post</h1>

        <form action="{{route('posts.update', $post->id)}}" method="POST" class="mb-5">
            @csrf
            @method("PUT")

            {{-- post title --}}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Add title" value="{{old('title') ? old('title') : $post->title}}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- post content --}}
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" placeholder="Add post content" rows="10">{{old('content') ? old('content') : $post->content}}</textarea>
                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- post published --}}
            <div class="form-group form-check">
                @php
                    $publish = old("published") ? old("published") : $post->published;
                @endphp
                <input type="checkbox" class="form-check-input @error('published') is-invalid @enderror" id="published" name="published" {{$publish ? 'checked' : ''}}>
                <label class="form-check-label" for="published">Publish</label>
                @error('published')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- submit button --}}
            <button type="submit" class="btn btn-primary">Modify</button>

        </form>

        <a href="{{route('posts.index')}}"><button type="button" class="btn btn-dark">Posts list</button></a>
    </div>
@endsection