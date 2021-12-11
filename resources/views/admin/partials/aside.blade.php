<aside class="aside">
    <ul class="nav flex-column admin-nav">
        <li class="nav-item admin-nav__nav_item">
            <a class="nav-link admin-nav__nav-link active" href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="nav-item admin-nav__nav_item">
            <a class="nav-link admin-nav__nav-link active" href="{{ route('admin.posts.index') }}">Posts</a>
        </li>
        {{-- <li class="nav-item admin-nav__nav-item">
            <a class="nav-link admin-nav__nav-link admin-nav__collapse-toggler" data-toggle="collapse"
                href="#multiCollapseExample1" role="button" aria-expanded="false"
                aria-controls="multiCollapseExample1">Posts <span class="admin-nav__icon">
                    <i class="fas fa-chevron-down"></i>
                </span></a>
            <div class="collapse multi-collapse admin-nav__collapse" id="multiCollapseExample1">
                <a class="admin-nav__collapse-link" href="{{ route('admin.posts.index') }}">Posts</a>
                <a class="admin-nav__collapse-link" href="{{ route('admin.posts.create') }}">Add Post</a>
            </div>
        </li> --}}
        <li class="nav-item admin-nav__nav-item">
            <a class="nav-link admin-nav__nav-link" href="{{ route('admin.comments.index') }}">Comments</a>
        </li>
    </ul>
    <a class="btn btn-danger aside__logout-btn" href="#">Log Out</a>
</aside>
