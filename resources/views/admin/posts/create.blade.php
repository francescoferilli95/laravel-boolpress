@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">CREATE NEW POST</h1>
        
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
                <form action="{{ route('admin.posts.store') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="mb-3">
                        <label for="title" class="form-label">Title*</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                        @error('title')
                            <div class="feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                         <label for="content" class="form-label">Content*</label>
                         <textarea name="content" id="content" rows="6" class="form-control  @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                         @error('content')
                            <div class="feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category_id">Category</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" @if($category->id === old('category_id')) selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                         @error('category_id')
                            <div class="feedback">{{ $message }}</div>
                        @enderror                        
                    </div>

                    <button class="btn btn-primary" type="submit">Create post</button>
                </form>
            </div>
        </div>
    </div>
@endsection