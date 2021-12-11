@extends('admin.master')

@section('content-inner')
    <div class="main__content__inner">
        <div class="add-post">
            <h3 class="add-post__header">Edit This Post</h3>
        </div>

        <div class="add-post__body">
            <form action="{{ route('admin.posts.update', $post->id) }}" class="add-post__form" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method("put")
                <div class="form-group">
                    <label for="titleInput">Title</label>
                    <input type="text" name="title" class="form-control" id="titleInput" value="{{ $post->title }}">
                    @error('title')
                        <span class="text-danger mt-2" style="font-size: 12px">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputCategory">Author</label>
                    <select id="inputAuthor" name="author" value="{{ $post->author }}" class="form-control">
                        <option selected>Choose...</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                    @error('author')
                        <span class="text-danger mt-2" style="font-size: 12px">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputCategory">Category</label>
                    <select id="inputCategory" name="category" value="{{ $post->category }}" class="form-control">
                        <option selected>Choose...</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->slug }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="text-danger mt-2" style="font-size: 12px">{{ $message }}</span>
                    @enderror
                </div>
                <div class="custom-file my-3">
                    <input type="file" name="img_path" value="{{ $post->img_path }}" class="custom-file-input"
                        id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                    @error('img_path')
                        <span class="text-danger mt-2" style="font-size: 12px">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="textareaBody">Body</label>
                    <textarea class="form-control" name="body" id="textareaBody" rows="6">{{ $post->body }}</textarea>
                    @error('body')
                        <span class="text-danger mt-2" style="font-size: 12px">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
