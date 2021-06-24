@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">EDIT: <a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a> </h1>
        
        <div class="row">
            <div class="col-md-8 offset-md-2">
                @if ($errors->any()) 
                    <div class="alert alert-danger mb-5">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif                
                <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                        <label for="title" class="form-label">Title*</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}">
                        @error('title')
                            <div class="feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                         <label for="content" class="form-label">Content*</label>
                         <textarea name="content" id="content" rows="6" class="form-control  @error('content') is-invalid @enderror">{{ old('content', $post->content) }}</textarea>
                         @error('content')
                            <div class="feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category_id">Category</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" @if($category->id === old('category_id', $post->category_id)) selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                         @error('category_id')
                            <div class="feedback">{{ $message }}</div>
                        @enderror                        
                    </div>

                    {{-- TAGS --}}
                    <h4>Tags</h4>
                    <div class="mb-3">
                        {{-- @dump($post->tags) --}}
                        @foreach ($tags as $tag)
                            <span class="d-inline-block mr-3">
                                <input type="checkbox" name="tags[]" id="tag{{ $loop->iteration }}" value="{{$tag->id}}" @if ($errors->any() && in_array($tag->id, old('tags'))) checked @elseif(! $errors->any() && $post->tags->contains($tag->id)) checked @endif>
                                <label for="tag{{ $loop->iteration }}">
                                {{$tag->name}}</label>
                            </span>
                        @endforeach
                        @error('tags')
                            <div>{{$message}}</div>
                        @enderror
                    </div> 

                    <button class="btn btn-primary" type="submit">Edit post</button>
                </form>
            </div>
        </div>
    </div>
@endsection