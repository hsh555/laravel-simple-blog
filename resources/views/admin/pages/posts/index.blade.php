@extends("admin.master")

@section('content-inner')
    <div class="main__content__inner">
        <div class="row">
            <div class="col-12">
                <div class="table-header d-flex justify-content-between mb-3">
                    <h3 class="title">Posts</h3>
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create Post</a>
                </div>
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">title</th>
                            <th scope="col">author</th>
                            <th scope="col">status</th>
                            <th scope="col">actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->author->name }}</td>
                                <td>{{ $post->status ? 'active' : 'not active' }}</td>
                                <td class="custom-table__actions">
                                    <a href="{{ route('admin.posts.edit', $post->id) }}"
                                        class="table__actions__edit bg-primary text-white" title="edit post"><i
                                            class="fas fa-pen"></i></a>
                                    <a href="{{ route('admin.posts.active', $post->id) }}"
                                        class="table__actions__change-status bg-info text-white" title="hide/show post">
                                        @if ($post->status)
                                            <i class='far fa-eye'></i>
                                        @else
                                            <i class="far fa-eye-slash"></i>
                                        @endif
                                    </a>
                                    <form action="{{ route('admin.posts.delete', $post->id) }}" method="POST">
                                        @csrf
                                        @method("delete")
                                        <button class="table__actions__delete bg-danger text-white" title="delete post"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
            <div class="col-12">
                {{ $posts->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
        {{-- <div class="col-12">
                <nav class="d-flex justify-content-center mt-5" aria-label="...">
                    <ul class="pagination admin-pagination">
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">1</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                    </ul>
                </nav>
            </div> --}}
    </div>

    </div>
@endsection
