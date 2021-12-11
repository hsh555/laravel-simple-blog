@extends("web.master")

@section('main')
    <main class="main">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary">

                        @if ($posts->count())
                            {{ $posts->total() }} Post Found for <span class="bg-warning px-2">{{ $query }}</span>
                        @else
                            Does Not Exists Any Posts for <span class="bg-warning px-2">{{ $query }}</span>
                        @endif

                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card post-card">
                            <img src="./assets/images/posts/1.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title post-card__title">{{ $post->title }}</h5>
                                <p class="card-text post-card__text">{{ Str::substr($post->body, 0, 100) }}</p>

                                <a href="{{ route('single', $post->id) }}" class="btn btn-primary post-card__btn">Read
                                    More...</a>
                            </div>
                            <div class="card-footer post-card__footer">
                                @php
                                    $commentsCount = $post->comments->where("status", 1)->count();
                                    $author = $post->author->name;

                                @endphp
                                <span class="post-card__author">Author: {{ $author }}</span>
                                <div class="ml-auto">
                                    <span
                                        class="post-card__date mr-3">{{ date('Y-m-d', strtotime($post->created_at)) }}</span>
                                    <span class="post-card__comment-icon">
                                        <i class="far fa-comment"></i>
                                        {{ $commentsCount }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-12">
                    {{ $posts->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </main>
@endsection
