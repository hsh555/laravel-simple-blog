@extends('web.master')

@section('style')
    <link rel="stylesheet" href="{{ asset('./assets/css/single.min.css') }}">
@endsection

@section('main')
    <div class="single">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="single__main-img">
                        <img src="{{ asset($post->img_path) }}" alt="">
                    </div>
                </div>
                <div class="col-12">
                    <div class="single__content">
                        <h1 class="single__content__title">{{ $post->title }}</h1>
                        <div class="single__content__text">
                            {{ $post->body }}
                        </div>
                        <div class="single__content__footer">

                            <img class="single__author__img" src="{{ asset('./assets/images/users/avatars/1.jpg') }}"
                                alt="">
                            <span class="single__author__text">{{ $post->author->name }}</span>

                            <span class="single__author__date">{{ date('Y-m-d', strtotime($post->created_at)) }}</span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="single__add-comment">
                        <h4 class="single__add-comment__title">Add a New Comment</h4>
                        <form class="single__add-comment__form" action="{{ route('comments.store', $post->id) }}"
                            method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                    id="name">
                                @error('title')
                                    <span class="text-danger mt-2" style="font-size: 12px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="user_name" value="{{ old('user_name') }}" class="form-control"
                                    id="name">
                                @error('user_name')
                                    <span class="text-danger mt-2" style="font-size: 12px">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="user_email" class="form-control" value="{{ old('email') }}"
                                    id="email" aria-describedby="emailHelp">
                                @error('user_email')
                                    <span class="text-danger mt-2" style="font-size: 12px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Write Here</label>
                                <textarea name="body" class="form-control" id="exampleFormControlTextarea1"
                                    rows="3">{{ old('body') }}</textarea>
                                @error('body')
                                    <span class="text-danger mt-2" style="font-size: 12px">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="single__comments">
                        <div class="single__comments__divider">Comments</div>
                        @forelse ($comments as $comment)
                            <div class="single__comment">
                                <div class="single__comment__username">{{ $comment->user_name }}</div>
                                <div class="single__comment__body">
                                    <h6 class="single__comment__title">{{ $comment->title }}</h6>
                                    <p class="single__comment__text">
                                        {{ $comment->body }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info">No Comment Yet!</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
