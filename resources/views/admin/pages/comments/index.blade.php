@extends("admin.master")

@section('content-inner')
    <div class="main__content__inner">
        <div class="row">
            <div class="col-12">
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
                        @foreach ($comments as $comment)
                            <tr>
                                <th scope="row">{{ $comment->id }}</th>
                                <td>{{ $comment->title }}</td>
                                <td>{{ $comment->user_email }}</td>
                                <td>{{ $comment->status ? 'active' : 'not active' }}</td>
                                <td class="custom-table__actions">
                                    <a href="{{ route('admin.comments.active', $comment->id) }}"
                                        class="table__actions__change-status bg-info text-white" title="hide/show post">
                                        @if ($comment->status)
                                            <i class='far fa-eye'></i>
                                        @else
                                            <i class="far fa-eye-slash"></i>
                                        @endif
                                    </a>
                                    <form action="{{ route('admin.comments.delete', $comment->id) }}" method="POST">
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
                {{ $comments->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>

    </div>
@endsection
