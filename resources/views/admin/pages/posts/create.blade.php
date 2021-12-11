@extends('admin.master')

@section('content-inner')
    <div class="main__content__inner">
        <div class="add-post">
            <h3 class="add-post__header">Add A Post</h3>
        </div>

        <div class="add-post__body">
            <form action="{{ route('admin.posts.store') }}" class="add-post__form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="titleInput">Title</label>
                    <input type="text" name="title" class="form-control" id="titleInput">
                </div>
                <div class="form-group">
                    <label for="inputCategory">Author</label>
                    <select id="inputAuthor" name="author" class="form-control">
                        <option selected>Choose...</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="inputCategory">Category</label>
                    <select id="inputCategory" name="category" class="form-control">
                        <option selected>Choose...</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->slug }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="custom-file my-3">
                    <input type="file" name="img_path" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <div class="form-group">
                    <label for="textareaBody">Body</label>
                    <textarea class="form-control" name="body" id="textareaBody" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
